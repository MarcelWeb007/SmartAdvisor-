<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\Expense;
use App\Models\AiInsights;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(3)->create()->each(function (User $user) {
            // Crée 1 entreprise par utilisateur
            $company = Company::factory()->for($user)->create();

            // 5 clients
            $customers = Customer::factory(5)->for($company)->create();

            // 3 services
            $services = Service::factory(3)->for($company)->create();

            // Transactions (1 par service et client)
            foreach ($customers as $customer) {
                foreach ($services as $service) {
                    Transaction::create([
                        'company_id' => $company->id,
                        'customer_id' => $customer->id,
                        'service_id' => $service->id,
                        'amount' => $service->price,
                        'type' => 'income',
                        'transaction_date' => Carbon::now()->subDays(rand(1, 90)),
                        'notes' => 'Paiement pour ' . $service->name,
                    ]);
                }
            }

            // 5 dépenses
            Expense::factory(5)->for($company)->create();

            // 2 insights IA fictifs
            AiInsights::factory(2)->for($company)->create();
        });
    }
}
