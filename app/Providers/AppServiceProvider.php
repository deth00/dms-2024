<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cookie;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view)
        {
            $token = Cookie::get('token');
            if ($token){
                $count_doc_type = Http::get('http://192.168.128.193:8080/api/doc-type');
                $data_doc_type = $count_doc_type['data'];
                $username = Cookie::get('user_name');
                $rolename = Cookie::get('role_id');
                $docc_count = Http::withToken($token)->get('http://192.168.128.193:8080/api/log-docc-count');
                if($docc_count['message'] == 'success'){
                    $count_docc = $docc_count['data'][0]['count'];
                }else{
                    $count_docc = 0;
                }

                $msg_count = Http::withToken($token)->get('http://192.168.128.193:8080/api/inbox-count');
                if($msg_count['message'] == 'success'){
                    $count_msg = $msg_count['data'][0]['count'];
                }else{
                    $count_msg = 0;
                }

                View::share(['data_doc_type'=>$data_doc_type,'username'=>$username,'rolename'=>$rolename,'count_docc'=>$count_docc,'count_msg'=>$count_msg]);
            }
        });
        
    }
}
