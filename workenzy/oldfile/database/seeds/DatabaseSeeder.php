<?php
/*
 * File name: DatabaseSeeder.php
 * Last modified: 2021.03.02 at 11:33:08
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);

        $this->call(CustomFieldsTableSeeder::class);
        $this->call(CustomFieldValuesTableSeeder::class);
        $this->call(AppSettingsTableSeeder::class);
        $this->call(EProviderTypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FaqCategoriesTableSeeder::class);
        $this->call(BookingStatusesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(OptionGroupsTableSeeder::class);

        $this->call(EProvidersTableSeeder::class);
        $this->call(EServicesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(EServiceReviewsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(AwardsTableSeeder::class);
        $this->call(ExperiencesTableSeeder::class);

        $this->call(MediaTableSeeder::class);
        $this->call(UploadsTableSeeder::class);
        $this->call(EarningsTableSeeder::class);
        $this->call(EProvidersPayoutsTableSeeder::class);
        $this->call(EServiceCategoriesTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(CustomPagesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(PaymentStatusesTableSeeder::class);
        $this->call(TaxesTableSeeder::class);

    }
}
