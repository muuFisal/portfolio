<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            @php
                $setting = \App\Models\Setting::first();
            @endphp
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('dashboard.home') }}"><span
                        class="brand-logo"><img src="{{ asset($setting->logo) }}"></span>
                    <h2 class="brand-text">{{ $setting->site_name }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @yield('dashboard-active')"><a class="d-flex align-items-center"
                    href="{{ route('dashboard.home') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Email">{{ __('dashboard.home') }}</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>

            @can('roles')
                <li class="nav-item @yield('roles-open') @yield('createRole-open')"><a class="d-flex align-items-center"
                        href="#"><i data-feather='align-justify'></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">{{ __('dashboard.roles') }}</span></a>
                    <ul class="menu-content">
                        <li><a class="@yield('roles-active') d-flex align-items-center"
                                href="{{ route('dashboard.roles.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">{{ __('dashboard.roles') }}</span></a>
                        </li>
                        <li><a class="@yield('createRole-active') d-flex align-items-center"
                                href="{{ route('dashboard.roles.create') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="Permission">{{ __('dashboard.create-role') }}</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('admins')
                <li class="nav-item @yield('admins-open') @yield('createAdmin-open')"><a class="d-flex align-items-center"
                        href="#"><i data-feather='users'></i><span class="menu-title text-truncate">
                            {{ __('dashboard.admins') }}</span>
                        <span class="badge badge-light-warning rounded-pill ms-auto me-1">{{ App\Models\Admin::count() - 1}}</span>
                    </a>
                    <ul class="menu-content">
                        <li><a class="@yield('admins-active') d-flex align-items-center"
                                href="{{ route('dashboard.admins.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="Roles">{{ __('dashboard.admins') }}</span></a>
                        </li>
                        <li><a class="@yield('createAdmin-active') d-flex align-items-center"
                                href="{{ route('dashboard.admins.create') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="Permission">{{ __('dashboard.create-admin') }}</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('users')
                <li class="nav-item @yield('users-open') @yield('createUser-open')"><a class="d-flex align-items-center"
                        href="#"><i data-feather='users'></i><span class="menu-title text-truncate">
                            {{ __('dashboard.users') }}</span>
                        <span class="badge badge-light-warning rounded-pill ms-auto me-1"> {{ App\Models\User::count() }} </span>
                    </a>
                    <ul class="menu-content">
                        <li><a class="@yield('users-active') d-flex align-items-center"
                                href="{{ route('dashboard.users.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="Roles">{{ __('dashboard.users') }}</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @php
                $portfolioPermissions = [
                    'portfolio_settings_view',
                    'portfolio_profile_view',
                    'portfolio_about_view',
                    'portfolio_home_sections_view',
                    'portfolio_navigation_view',
                    'portfolio_seo_pages_view',
                    'portfolio_projects_view',
                    'portfolio_achievements_view',
                    'portfolio_experiences_view',
                    'portfolio_skills_view',
                    'portfolio_events_view',
                    'portfolio_testimonials_view',
                    'portfolio_comments_view',
                    'portfolio_contacts_view',
                ];
            @endphp

            @if (auth('admin')->user()?->canAny($portfolioPermissions))
                <li class="nav-item @yield('portfolio-open')"><a class="d-flex align-items-center" href="#">
                        <i data-feather="briefcase"></i><span class="menu-title text-truncate">
                            {{ __('dashboard.portfolio') }}</span>
                    </a>
                    <ul class="menu-content">
                        @can('portfolio_settings_view')
                            <li><a class="@yield('portfolio-settings-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.settings') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-settings') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_profile_view')
                            <li><a class="@yield('portfolio-profile-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.profile') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-profile') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_about_view')
                            <li><a class="@yield('portfolio-about-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.about') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-about') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_home_sections_view')
                            <li><a class="@yield('portfolio-sections-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.sections.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-home-sections') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_navigation_view')
                            <li><a class="@yield('portfolio-navigation-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.navigation.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-navigation') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_seo_pages_view')
                            <li><a class="@yield('portfolio-seo-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.seo-pages.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-seo-pages') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_projects_view')
                            <li><a class="@yield('portfolio-projects-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.projects.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-projects') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_achievements_view')
                            <li><a class="@yield('portfolio-achievements-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.achievements.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-highlights') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_experiences_view')
                            <li><a class="@yield('portfolio-experiences-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.experiences.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-experiences') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_skills_view')
                            <li><a class="@yield('portfolio-skills-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.skills.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-skills') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_events_view')
                            <li><a class="@yield('portfolio-events-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.events.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-events') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_testimonials_view')
                            <li><a class="@yield('portfolio-testimonials-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.testimonials.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-testimonials') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_comments_view')
                            <li><a class="@yield('portfolio-comments-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.comments.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-comments') }}</span></a>
                            </li>
                        @endcan
                        @can('portfolio_contacts_view')
                            <li><a class="@yield('portfolio-contacts-active') d-flex align-items-center"
                                    href="{{ route('dashboard.portfolio.contacts.index') }}"><i data-feather="circle"></i><span
                                        class="menu-item text-truncate">{{ __('dashboard.portfolio-contact-messages') }}</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif



            @can('settings')
            <li class="nav-item @yield('settings-open')"><a class="d-flex align-items-center" href="#">
                    <i data-feather="settings"></i><span class="menu-title text-truncate"
                        data-i18n="Roles &amp; Permission">{{ __('dashboard.settings') }}</span>
                </a>
                <ul class="menu-content">
                    <li><a class="@yield('settings-active') d-flex align-items-center"
                            href="{{ route('dashboard.settings') }}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate"
                                data-i18n="Roles">{{ __('dashboard.genral-setting') }}</span></a>
                    </li>
                </ul>
            </li>
        @endcan

        </ul>
    </div>
</div>
