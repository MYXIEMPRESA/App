@php
    $url = '';

    $MyNavBar = \Menu::make('MenuList', function ($menu) use($url){
        
        //Admin Dashboard
        $menu->add('<span>'.__('message.dashboard').'</span>', ['route' => 'home'])
            ->prepend('<i class="fas fa-home"></i>')            
            ->link->attr(['class' => '']); 

        $menu->add('<span>'.__('message.customer').'</span>', [ 'class' => ''])
                ->prepend('<i class="fa fa-user-circle"></i>')
                ->nickname('customer')
                ->data('permission', 'customer-list')
                ->link->attr(['class' => ''])
                ->href('#customer');
                
            $menu->customer->add('<span>'.__('message.list_form_title',['form' => __('message.customer')]).'</span>', ['class' => request()->is('customer/*') ? 'sidebar-layout active' : 'sidebar-layout' ,'route' => 'customer.index'])
                    ->data('permission', 'customer-list')
                    ->prepend('<i class="fas fa-list"></i>')
                    ->link->attr(['class' => '']); 
    
        $menu->add('<span>'.__('message.sub_admin').'</span>', [ 'class' => ''])
                ->prepend('<i class="fa fa-user"></i>')
                ->nickname('users')
                ->data('permission', 'subadmin-list')
                ->link->attr(['class' => ''])
                ->href('#users');
                 
            $menu->users->add('<span>'.__('message.list_form_title',['form' => __('message.sub_admin')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'users.index'])
                    ->data('permission', 'subadmin-list')
                    ->prepend('<i class="fas fa-list"></i>')
                    ->link->attr(['class' => '']);

            $menu->users->add('<span>'.__('message.add_form_title',['form' => __('message.sub_admin')]).'</span>', ['class' => request()->is('users/*/edit') ? 'sidebar-layout active' : 'sidebar-layout','route' => 'users.create'])
                ->data('permission', [ 'subadmin-add', 'subadmin-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);

     

        $menu->add('<span>'.__('message.amenity').'</span>', ['class' => ''])
            ->prepend('<i class="fas fa-globe"></i>')
            ->nickname('amenity')
            ->data('permission', 'amenity-list')
            ->link->attr(['class' => ''])
            ->href('#amenity');

            $menu->amenity->add('<span>'.__('message.list_form_title',['form' => __('message.amenity')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'amenity.index'])
                ->data('permission', 'amenity-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->amenity->add('<span>'.__('message.add_form_title',['form' => __('message.amenity')]).'</span>', ['class' => request()->is('amenity/*/edit') ? 'sidebar-layout active' : 'sidebar-layout','route' => 'amenity.create'])
                ->data('permission', [ 'amenity-add', 'amenity-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);

        $menu->add('<span>'.__('message.category').'</span>', ['class' => ''])
                ->prepend('<i class="fas fa-align-justify"></i>')
                ->nickname('category')
                ->data('permission', 'category-list')
                ->link->attr(['class' => ''])
                ->href('#category');

            $menu->category->add('<span>'.__('message.list_form_title',['form' => __('message.category')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'category.index'])
                ->data('permission', 'category-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->category->add('<span>'.__('message.add_form_title',['form' => __('message.category')]).'</span>', ['class' => request()->is('category/*/edit') ? 'sidebar-layout active' : 'sidebar-layout','route' => 'category.create'])
                ->data('permission', [ 'category-add', 'category-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);

        $menu->add('<span>'.__('message.property').'</span>', [ 'class' => '', 'route' => 'property.index'])
                ->prepend('<i class="fas fa-building"></i>')
                ->nickname('property')
                ->data('permission', 'property-list')
                ->link->attr(['class' => ''])
                ->href('#property');

            $menu->property->add('<span>'.__('message.list_form_title',['form' => __('message.property')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'property.index'])
                ->data('permission', 'property-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->property->add('<span>'.__('message.add_form_title',['form' => __('message.property')]).'</span>', ['class' => request()->is('property/*/edit') ? 'sidebar-layout active' : 'sidebar-layout','route' => 'property.create'])
                ->data('permission', [ 'property-add', 'property-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);
            
            $menu->property->add('<span>'.__('message.list_form_title',['form' => __('message.advertisement_property')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'advertisement.property.list'])
                ->data('permission', 'property-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

        $menu->add('<span>'.__('message.news_article').'</span>', ['class' => ''])
                ->prepend('<i class="fas fa-file-alt"></i>')
                ->nickname('article')
                ->data('permission', 'article-list')
                ->link->attr(['class' => ''])
                ->href('#article');

            $menu->article->add('<span>'.__('message.list_form_title',['form' => __('message.tags')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'tags.index'])
                ->data('permission', 'tags-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->article->add('<span>'.__('message.list_form_title',['form' => __('message.news_article')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'article.index'])
                ->data('permission', 'article-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->article->add('<span>'.__('message.add_form_title',['form' => __('message.news_article')]).'</span>', ['class' => request()->is('article/*/edit') ? 'sidebar-layout active' : 'sidebar-layout','route' => 'article.create'])
                ->data('permission', [ 'article-add', 'article-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);
        
        $menu->add('<span>'.__('message.slider').'</span>', [ 'class' => '', 'route' => 'slider.index'])
                ->prepend('<i class="fas fa-sliders-h"></i>')
                ->nickname('slider')
                ->data('permission', 'slider-list')
                ->link->attr(['class' => ''])
                ->href('#slider');

            $menu->slider->add('<span>'.__('message.list_form_title',['form' => __('message.slider')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'slider.index'])
                ->data('permission', 'slider-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->slider->add('<span>'.__('message.add_form_title',['form' => __('message.slider')]).'</span>', ['class' => request()->is('slider/*/edit') ? 'sidebar-layout active' : 'sidebar-layout','route' => 'slider.create'])
                ->data('permission', [ 'slider-add', 'slider-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);      

        $menu->add('<span>'.__('message.package').'</span>', ['class' => ''])
                    ->prepend('<i class="fas fa-store"></i>')
                    ->nickname('package')
                    ->data('permission', 'package-list')
                    ->link->attr(['class' => ''])
                    ->href('#package');

            $menu->package->add('<span>'.__('message.list_form_title',['form' => __('message.package')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'package.index'])
                ->data('permission', 'package-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->package->add('<span>'.__('message.add_form_title',['form' => __('message.package')]).'</span>', ['class' => request()->is('package/*/edit') ? 'sidebar-layout active' : 'sidebar-layout','route' => 'package.create'])
                ->data('permission', [ 'package-add', 'package-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);

            $menu->package->add('<span>'.__('message.list_form_title',['form' => __('message.extrapropertylimit')]).'</span>', ['class' => request()->is('extrapropertylimit/*/edit') || request()->is('extrapropertylimit/create') ? 'sidebar-layout active' : 'sidebar-layout' ,'route' => 'extrapropertylimit.index'])
                ->data('permission', 'extra property limit-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);
        
        $menu->add('<span>'.__('message.subscription').'</span>', ['class' => ''])
                    ->prepend('<i class="fas fa-hand-holding-usd"></i>')
                    ->nickname('subscription')
                    ->data('permission', 'subscription-list')
                    ->link->attr(['class' => ''])
                    ->href('#subscription');

            $menu->subscription->add('<span>'.__('message.list_form_title',['form' => __('message.subscription')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'subscription.index'])
                ->data('permission', 'subscription-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

        $menu->add('<span>'.__('message.pushnotification').'</span>', ['class' => ''])
                    ->prepend('<i class="fas fa-bullhorn"></i>')
                    ->nickname('pushnotification')
                    ->data('permission', 'push notification-list')
                    ->link->attr(['class' => ''])
                    ->href('#pushnotification');

            $menu->pushnotification->add('<span>'.__('message.list_form_title',['form' => __('message.pushnotification')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'pushnotification.index'])
                ->data('permission', 'push notification-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->pushnotification->add('<span>'.__('message.add_form_title',['form' => __('message.pushnotification')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'pushnotification.create'])
                ->data('permission', [ 'push notification-add', 'push notification-edit'])
                ->prepend('<i class="fas fa-plus-square"></i>')
                ->link->attr(['class' => '']);

        $menu->add('<span>'.__('message.account_setting').'</span>', ['class' => ''])
                ->prepend('<i class="fas fa-users-cog"></i>')
                ->nickname('account_setting')
                ->data('permission', ['role-list','permission-list'])
                ->link->attr(["class" => ""])
                ->href('#account_setting');

            $menu->account_setting->add('<span>'.__('message.list_form_title',['form' => __('message.role')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'role.index'])
                ->data('permission', 'role-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->account_setting->add('<span>'.__('message.list_form_title',['form' => __('message.permission')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'permission.index'])
                ->data('permission', 'permission-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);
                
            $menu->add('<span>'.__('message.languagekeyword').'</span>', [ 'class' => ''])
                ->prepend('<i class="fa fa-user"></i>')
                ->nickname('app_language_setting')
                ->data('permission', '')
                ->link->attr(['class' => ''])
                ->href('#languagekeyword');

            $menu->app_language_setting->add('<span>'.__('message.list_form_title',['form' => __('message.screen')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'screen.index'])
                ->data('permission', 'screen-list')
                ->prepend('<i class="fas fa-list"></i>')
                ->link->attr(['class' => '']);

            $menu->app_language_setting->add('<span>'.__('message.list_form_title',['form' => __('message.default_keyword')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'languagekeyword.index'])
                    ->data('permission', 'languagekeyword-list')
                    ->prepend('<i class="fas fa-list"></i>')
                    ->link->attr(['class' => '']);

            $menu->app_language_setting->add('<span>'.__('message.list_form_title',['form' => __('message.language')]).'</span>', ['class' => request()->is('languagetable/*/edit') || request()->is('languagetable/create') ? 'sidebar-layout active' : 'sidebar-layout' ,'route' => 'languagetable.index'])
                    ->data('permission', 'language-list')
                    ->prepend('<i class="fas fa-list"></i>')
                    ->link->attr(['class' => '']);

            $menu->app_language_setting->add('<span>'.__('message.list_form_title',['form' => __('message.languagecontent')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'languagecontent.index'])
                    ->data('permission', 'languagecontent-list')
                    ->prepend('<i class="fas fa-list"></i>')
                    ->link->attr(['class' => '']);

            $menu->app_language_setting->add('<span>'.__('message.list_form_title',['form' => __('message.bulk_import_langugage_data')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'bulk.language.data'])
                    ->data('permission', 'bulkimport-list')
                    ->prepend('<i class="fas fa-list"></i>')
                    ->link->attr(['class' => '']);

            $menu->add('<span>'.__('message.pages').'</span>', ['class' => ''])
                    ->prepend('<i class="fas fa-file"></i>')
                    ->nickname('pages')
                    ->data('permission', ['terms-condition','privacy-policy'])
                    ->link->attr(['class' => ''])
                    ->href('#pages');
            $menu->pages->add('<span>'.__('message.terms_condition').'</span>', ['class' => 'sidebar-layout' ,'route' => 'term-condition'])
                ->data('permission', 'terms-condition')
                ->prepend('<i class="fas fa-file-contract"></i>')
                ->link->attr(['class' => '']);
            
            $menu->pages->add('<span>'.__('message.privacy_policy').'</span>', ['class' => 'sidebar-layout' ,'route' => 'privacy-policy'])
                ->data('permission', 'privacy-policy')
                ->prepend('<i class="fas fa-user-shield"></i>')
                ->link->attr(['class' => '']);
    
            $menu->add('<span>'.__('message.setting').'</span>', ['route' => 'setting.index'])
                    ->prepend('<i class="fas fa-cog"></i>')
                    ->nickname('setting')
                    ->data('permission', 'system-setting');
        

        })->filter(function ($item) {
            return checkMenuRoleAndPermission($item);
        });
@endphp

<div class="mm-sidebar sidebar-default">
    <div class="mm-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ getSingleMedia(appSettingData('get'),'site_logo',null) }}" class="img-fluid mode light-img rounded-normal light-logo site_logo_preview" alt="logo">
            <img src="{{ getSingleMedia(appSettingData('get'),'site_dark_logo',null) }}" class="img-fluid mode dark-img rounded-normal darkmode-logo site_dark_logo_preview" alt="dark-logo">
        </a>
        <div class="side-menu-bt-sidebar p-0">
            <i class="fas fa-bars wrapper-menu p-1"></i>
        </div>
    </div>

    <div class="data-scrollbar" data-scroll="1">
        <nav class="mm-sidebar-menu">
            <ul id="mm-sidebar-toggle" class="side-menu">
                @include(config('laravel-menu.views.bootstrap-items'), ['items' => $MyNavBar->roots()])       
            </ul>
        </nav>
        <div class="pt-5 pb-2"></div>
    </div>
</div>
