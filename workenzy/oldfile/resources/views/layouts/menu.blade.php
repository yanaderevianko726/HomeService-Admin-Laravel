@can('dashboard')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{!! url('dashboard') !!}">@if($icons)
                <i class="nav-icon fas fa-tachometer-alt"></i>@endif
            <p>{{trans('lang.dashboard')}}</p></a>
    </li>
@endcan

@can('notifications.index')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('notifications*') ? 'active' : '' }}" href="{!! route('notifications.index') !!}">@if($icons)
                <i class="nav-icon fas fa-bell"></i>@endif<p>{{trans('lang.notification_plural')}}</p></a>
    </li>
@endcan
@can('favorites.index')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('favorites*') ? 'active' : '' }}" href="{!! route('favorites.index') !!}">@if($icons)
                <i class="nav-icon fas fa-heart"></i>@endif<p>{{trans('lang.favorite_plural')}}</p></a>
    </li>
@endcan

<li class="nav-header">{{trans('lang.app_management')}}</li>


@can('eProviders.index')
    <li class="nav-item has-treeview {{ (Request::is('eProvider*') || Request::is('requestedEProviders*') || Request::is('galleries*') || Request::is('experiences*') || Request::is('awards*') || Request::is('addresses*') || Request::is('availabilityHours*') ) && !Request::is('eProviderPayouts*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ (Request::is('eProvider*') || Request::is('requestedEProviders*') || Request::is('galleries*') || Request::is('experiences*') || Request::is('awards*') || Request::is('addresses*') || Request::is('availabilityHours*')) && !Request::is('eProviderPayouts*') ? 'active' : '' }}"> @if($icons)
                <i class="nav-icon fas fa-users-cog"></i>@endif
            <p>{{trans('lang.e_provider_plural')}} <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('eProviderTypes.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('eProviderTypes*') ? 'active' : '' }}" href="{!! route('eProviderTypes.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-list-alt"></i>@endif<p>{{trans('lang.e_provider_type_plural')}}</p></a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link {{ Request::is('eProviders*') ? 'active' : '' }}" href="{!! route('eProviders.index') !!}">@if($icons)
                        <i class="nav-icon fas fa-list-alt"></i>@endif<p>{{trans('lang.e_provider_plural')}}</p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('requestedEProviders*') ? 'active' : '' }}" href="{!! route('requestedEProviders.index') !!}">@if($icons)
                        <i class="nav-icon fas fa-list-alt"></i>@endif<p>{{trans('lang.requested_e_providers_plural')}}</p></a>
            </li>
            @can('galleries.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('galleries*') ? 'active' : '' }}" href="{!! route('galleries.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-image"></i>@endif<p>{{trans('lang.gallery_plural')}}</p></a>
                </li>
            @endcan
            @can('awards.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('awards*') ? 'active' : '' }}" href="{!! route('awards.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-trophy"></i>@endif<p>{{trans('lang.award_plural')}}</p></a>
                </li>
            @endcan

            @can('experiences.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('experiences*') ? 'active' : '' }}" href="{!! route('experiences.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-briefcase"></i>@endif<p>{{trans('lang.experience_plural')}}</p></a>
                </li>
            @endcan
            @can('availabilityHours.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('availabilityHours*') ? 'active' : '' }}" href="{!! route('availabilityHours.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-business-time"></i>@endif<p>{{trans('lang.availability_hour_plural')}}</p></a>
                </li>
            @endcan
            @can('addresses.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('addresses*') ? 'active' : '' }}" href="{!! route('addresses.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-map-marked-alt"></i>@endif<p>{{trans('lang.address_plural')}}</p></a>
                </li>
            @endcan
        </ul>
    </li>
@endcan
@can('categories.index')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{!! route('categories.index') !!}">@if($icons)
                <i class="nav-icon fas fa-folder-open"></i>@endif<p>{{trans('lang.category_plural')}}</p></a>
    </li>
@endcan

@can('eServices.index')
    <li class="nav-item has-treeview {{ Request::is('eServices*') || Request::is('options*') || Request::is('optionGroups*') || Request::is('eServiceReviews*') || Request::is('nutrition*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{  Request::is('eServices*') || Request::is('options*') || Request::is('optionGroups*') || Request::is('eServiceReviews*') || Request::is('nutrition*') ? 'active' : '' }}"> @if($icons)
                <i class="nav-icon fas fa-pencil-ruler"></i>@endif
            <p>{{trans('lang.e_service_plural')}} <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('eServices.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('eServices*') ? 'active' : '' }}" href="{!! route('eServices.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-list"></i>@endif
                        <p>{{trans('lang.e_service_table')}}</p></a>
                </li>
            @endcan
            @can('optionGroups.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('optionGroups*') ? 'active' : '' }}" href="{!! route('optionGroups.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-plus-square"></i>@endif<p>{{trans('lang.option_group_plural')}}</p></a>
                </li>
            @endcan
            @can('options.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('options*') ? 'active' : '' }}" href="{!! route('options.index') !!}">@if($icons)
                            <i class="nav-icon far fa-plus-square"></i>@endif<p>{{trans('lang.option_plural')}}</p></a>
                </li>
            @endcan


            @can('eServiceReviews.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('eServiceReviews*') ? 'active' : '' }}" href="{!! route('eServiceReviews.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-comments"></i>@endif<p>{{trans('lang.e_service_review_plural')}}</p></a>
                </li>
            @endcan

        </ul>
    </li>
@endcan

{{--@can('bookings.index')--}}
<li class="nav-item has-treeview {{ Request::is('bookings*') || Request::is('bookingStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('bookings*') || Request::is('bookingStatuses*') || Request::is('deliveryAddresses*')? 'active' : '' }}"> @if($icons)
            <i class="nav-icon fas fa-calendar-check"></i>@endif
        <p>{{trans('lang.booking_plural')}} <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        @can('bookings.index')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('bookings*') ? 'active' : '' }}" href="{!! route('bookings.index') !!}">@if($icons)
                        <i class="nav-icon fas fa-calendar-check"></i>@endif<p>{{trans('lang.booking_plural')}}</p></a>
            </li>
        @endcan
        @can('bookingStatuses.index')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('bookingStatuses*') ? 'active' : '' }}" href="{!! route('bookingStatuses.index') !!}">@if($icons)
                        <i class="nav-icon fas fa-server"></i>@endif<p>{{trans('lang.booking_status_plural')}}</p></a>
            </li>
        @endcan

        {{--            @can('deliveryAddresses.index')--}}
        {{--                <li class="nav-item">--}}
        {{--                    <a class="nav-link {{ Request::is('deliveryAddresses*') ? 'active' : '' }}" href="{!! route('deliveryAddresses.index') !!}">@if($icons)--}}
        {{--                            <i class="nav-icon fas fa-map"></i>@endif<p>{{trans('lang.delivery_address_plural')}}</p></a>--}}
        {{--                </li>--}}
        {{--            @endcan--}}

    </ul>
</li>
{{--@endcan--}}

@can('coupons.index')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('coupons*') ? 'active' : '' }}" href="{!! route('coupons.index') !!}">@if($icons)
                <i class="nav-icon fas fa-ticket-alt"></i>@endif<p>{{trans('lang.coupon_plural')}} </p></a>
    </li>
@endcan
@can('faqs.index')
    <li class="nav-item {{ Request::is('faqCategories*') || Request::is('faqs*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Request::is('faqs*') || Request::is('faqCategories*') ? 'active' : '' }}"> @if($icons)
                <i class="nav-icon fas fa-question-circle"></i>@endif
            <p>{{trans('lang.faq_plural')}} <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('faqCategories.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('faqCategories*') ? 'active' : '' }}" href="{!! route('faqCategories.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-folder-open"></i>@endif<p>{{trans('lang.faq_category_plural')}}</p></a>
                </li>
            @endcan

            @can('faqs.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('faqs*') ? 'active' : '' }}" href="{!! route('faqs.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-life-ring"></i>@endif
                        <p>{{trans('lang.faq_plural')}}</p></a>
                </li>
            @endcan
        </ul>
    </li>
@endcan

<li class="nav-header">{{trans('lang.app_setting')}}</li>
@can('medias')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('medias*') ? 'active' : '' }}" href="{!! url('medias') !!}">@if($icons)
                <i class="nav-icon fas fa-photo-video"></i>@endif
            <p>{{trans('lang.media_plural')}}</p></a>
    </li>
@endcan
{{--
@can('payments.index')
    <li class="nav-item has-treeview {{ Request::is('earnings*') || Request::is('driversPayouts*') || Request::is('eprovidersPayouts*') || Request::is('payments*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Request::is('earnings*') || Request::is('driversPayouts*') || Request::is('eprovidersPayouts*') || Request::is('payments*') ? 'active' : '' }}"> @if($icons)
                <i class="nav-icon fas fa-credit-card"></i>@endif
            <p>{{trans('lang.payment_plural')}}<i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            @can('payments.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('payments*') ? 'active' : '' }}" href="{!! route('payments.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-money"></i>@endif<p>{{trans('lang.payment_plural')}}</p></a>
                </li>
            @endcan

            @can('driversPayouts.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('driversPayouts*') ? 'active' : '' }}" href="{!! route('driversPayouts.index') !!}">@if($icons)<i class="nav-icon fas fa-dollar"></i>@endif<p>{{trans('lang.drivers_payout_plural')}}</p></a>
                </li>
            @endcan

            @can('eprovidersPayouts.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('eprovidersPayouts*') ? 'active' : '' }}" href="{!! route('eprovidersPayouts.index') !!}">@if($icons)<i class="nav-icon fas fa-dollar"></i>@endif<p>{{trans('lang.eproviders_payout_plural')}}</p></a>
                </li>
            @endcan

        </ul>
    </li>
@endcan
--}}

@can('payments.index')
    <li class="nav-item has-treeview {{ Request::is('payments*') || Request::is('paymentMethods*') || Request::is('paymentStatuses*')||Request::is('earnings*')|| Request::is('eProviderPayouts*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Request::is('payments*') || Request::is('paymentMethods*') || Request::is('paymentStatuses*')||Request::is('earnings*')|| Request::is('eProviderPayouts*') ? 'active' : '' }}"> @if($icons)
                <i class="nav-icon fas fa-money-check-alt"></i>@endif
            <p>{{trans('lang.payment_plural')}}<i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            @can('payments.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('payments*') ? 'active' : '' }}" href="{!! route('payments.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-money-check-alt"></i>@endif<p>{{trans('lang.payment_table')}}</p></a>
                </li>
            @endcan
            @can('paymentMethods.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('paymentMethods*') ? 'active' : '' }}" href="{!! route('paymentMethods.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-credit-card"></i>@endif<p>{{trans('lang.payment_method_plural')}}</p></a>
                </li>
            @endcan


            @can('paymentStatuses.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('paymentStatuses*') ? 'active' : '' }}" href="{!! route('paymentStatuses.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>@endif<p>{{trans('lang.payment_status_plural')}}</p></a>
                </li>
            @endcan

            @can('earnings.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('earnings*') ? 'active' : '' }}" href="{!! route('earnings.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-money-bill"></i>@endif<p>{{trans('lang.earning_plural')}}  </p></a>
                </li>
            @endcan

            @can('eProviderPayouts.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('eProviderPayouts*') ? 'active' : '' }}" href="{!! route('eProviderPayouts.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-money-bill-wave"></i>@endif<p>{{trans('lang.e_provider_payout_plural')}}</p></a>
                </li>
                @endcan

        </ul>
    </li>
@endcan

@can('app-settings')
    <li class="nav-item has-treeview {{ Request::is('settings/mobile*') || Request::is('slides*') || Request::is('customPages*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Request::is('settings/mobile*') || Request::is('slides*') || Request::is('customPages*') ? 'active' : '' }}">
            @if($icons)<i class="nav-icon fas fa-mobile-alt"></i>@endif
            <p>
                {{trans('lang.mobile_menu')}}
                <i class="right fas fa-angle-left"></i>
            </p></a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{!! url('settings/mobile/globals') !!}" class="nav-link {{  Request::is('settings/mobile/globals*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-cog"></i> @endif <p>{{trans('lang.app_setting_globals')}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{!! url('settings/mobile/colors') !!}" class="nav-link {{  Request::is('settings/mobile/colors*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-magic"></i> @endif <p>{{trans('lang.mobile_colors')}}
                    </p>
                </a>
            </li>

            @can('customPages.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('customPages*') ? 'active' : '' }}" href="{!! route('customPages.index') !!}">@if($icons)
                            <i class="nav-icon fa fa-file"></i>@endif<p>{{trans('lang.custom_page_plural')}}</p></a>
                </li>
            @endcan

            @can('slides.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('slides*') ? 'active' : '' }}" href="{!! route('slides.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-images"></i>@endif<p>{{trans('lang.slide_plural')}} </p>
                    </a>
                </li>
            @endcan
        </ul>

    </li>
    <li class="nav-item has-treeview {{
    (Request::is('settings*') ||
     Request::is('users*')) && !Request::is('settings/mobile*')
        ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{
        (Request::is('settings*') ||
         Request::is('users*')) && !Request::is('settings/mobile*')
          ? 'active' : '' }}"> @if($icons)<i class="nav-icon fas fa-cogs"></i>@endif
            <p>{{trans('lang.app_setting')}} <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{!! url('settings/app/globals') !!}" class="nav-link {{  Request::is('settings/app/globals*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-cog"></i> @endif <p>{{trans('lang.app_setting_globals')}}</p>
                </a>
            </li>

            @can('users.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{!! route('users.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-users"></i>@endif
                        <p>{{trans('lang.user_plural')}}</p></a>
                </li>
            @endcan

            <li class="nav-item has-treeview {{ Request::is('settings/permissions*') || Request::is('settings/roles*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('settings/permissions*') || Request::is('settings/roles*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-user-secret"></i>@endif
                    <p>
                        {{trans('lang.permission_menu')}}
                        <i class="right fas fa-angle-left"></i>
                    </p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('settings/permissions') ? 'active' : '' }}" href="{!! route('permissions.index') !!}">
                            @if($icons)<i class="nav-icon fas fa-circle-o"></i>@endif
                            <p>{{trans('lang.permission_table')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('settings/permissions/create') ? 'active' : '' }}" href="{!! route('permissions.create') !!}">
                            @if($icons)<i class="nav-icon fas fa-circle-o"></i>@endif
                            <p>{{trans('lang.permission_create')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('settings/roles') ? 'active' : '' }}" href="{!! route('roles.index') !!}">
                            @if($icons)<i class="nav-icon fas fa-circle-o"></i>@endif
                            <p>{{trans('lang.role_table')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('settings/roles/create') ? 'active' : '' }}" href="{!! route('roles.create') !!}">
                            @if($icons)<i class="nav-icon fas fa-circle-o"></i>@endif
                            <p>{{trans('lang.role_create')}}</p>
                        </a>
                    </li>
                </ul>

            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('settings/customFields*') ? 'active' : '' }}" href="{!! route('customFields.index') !!}">@if($icons)
                        <i class="nav-icon fas fa-list"></i>@endif<p>{{trans('lang.custom_field_plural')}}</p></a>
            </li>

            <li class="nav-item">
                <a href="{!! url('settings/app/localisation') !!}" class="nav-link {{  Request::is('settings/app/localisation*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-language"></i> @endif <p>{{trans('lang.app_setting_localisation')}}</p></a>
            </li>
            <li class="nav-item">
                <a href="{!! url('settings/translation/en') !!}" class="nav-link {{ Request::is('settings/translation*') ? 'active' : '' }}">
                    @if($icons) <i class="nav-icon fas fa-language"></i> @endif <p>{{trans('lang.app_setting_translation')}}</p></a>
            </li>
            @can('currencies.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('settings/currencies*') ? 'active' : '' }}" href="{!! route('currencies.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-dollar-sign"></i>@endif<p>{{trans('lang.currency_plural')}}</p></a>
                </li>
            @endcan
            @can('taxes.index')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('settings/taxes*') ? 'active' : '' }}" href="{!! route('taxes.index') !!}">@if($icons)
                            <i class="nav-icon fas fa-coins"></i>@endif
                        <p>{{trans('lang.tax_plural')}}</p></a>
                </li>
            @endcan

            <li class="nav-item">
                <a href="{!! url('settings/payment/payment') !!}" class="nav-link {{  Request::is('settings/payment*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-credit-card"></i> @endif <p>{{trans('lang.app_setting_payment')}}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{!! url('settings/app/social') !!}" class="nav-link {{  Request::is('settings/app/social*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-globe"></i> @endif <p>{{trans('lang.app_setting_social')}}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{!! url('settings/app/notifications') !!}" class="nav-link {{  Request::is('settings/app/notifications*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-bell"></i> @endif <p>{{trans('lang.app_setting_notifications')}}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{!! url('settings/mail/smtp') !!}" class="nav-link {{ Request::is('settings/mail*') ? 'active' : '' }}">
                    @if($icons)<i class="nav-icon fas fa-envelope"></i> @endif <p>{{trans('lang.app_setting_mail')}}</p>
                </a>
            </li>

        </ul>
    </li>
@endcan

