<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

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
        View::composer('*', function ($view) {
            $token = Cookie::get('token');
            $organi = Cookie::get('organi_id');
            if ($token) {
                $count_doc_type = Http::get('http://192.168.128.193:8080/api/doc-type');
                $data_doc_type = $count_doc_type['data'];
                $username = Cookie::get('user_name');
                $rolename = Cookie::get('role_id');
                $user_id = Cookie::get('user_id');
                $arr2 = explode(',', $rolename);
                // dd($arr2);
                $docc_count = Http::withToken($token)->get('http://192.168.128.193:8080/api/log-docc-count');
                if ($docc_count['message'] == 'success') {
                    $count_docc = $docc_count['data'][0]['count'];
                } else {
                    $count_docc = 0;
                }

                $msg_count = Http::withToken($token)->get('http://192.168.128.193:8080/api/inbox-count');
                if ($msg_count['message'] == 'success') {
                    $count_msg = $msg_count['data'][0]['count'];
                } else {
                    $count_msg = 0;
                }
             

                $check = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', [
                    'id' => 1
                ]);

                $check_ori = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', [
                    'id' => 4
                ]);

                $check_ho = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', [
                    'id' => 5
                ]);
                $check_ck = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', [
                    'id' => 6
                ]);

                // ທົ່ວໄປ
                foreach ($check['data'] as $item) {
                    foreach ($arr2  as $items) {
                        if ($item['id'] == $items) {
                            $role = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                                'id' => $item['id'],
                                'del' => 1
                            ]);
                        }
                    }
                }
                
                $ree = [];
                if (!empty($role['data'][0]['value'])) {
                    $ree  += explode(',', $role['data'][0]['value']);
                } else {
                    $ree = [];
                }
                $data_role = [];
                foreach ($ree as $item) {
                    $data_role += array($item => $item);
                }

                // 3 ori
                foreach ($check_ori['data'] as $item) {
                    foreach ($arr2  as $items) {
                        if ($item['id'] == $items) {
                            $role_ori = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                                'id' => $item['id'],
                                'del' => 4
                            ]);
                        }
                    }
                }

                $res_ori = [];

                if (!empty($role_ori['data'][0]['value'])) {
                    $res_ori  += explode(',', $role_ori['data'][0]['value']);
                } else {
                    $res_ori = [];
                }
                $data_ori = [];
                foreach ($res_ori as $item) {
                    $data_ori += array($item => $item);
                }

                //HO
                foreach ($check_ho['data'] as $item) {
                    foreach ($arr2  as $items) {
                        if ($item['id'] == $items) {
                            $role_ho = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                                'id' => $item['id'],
                                'del' => 5
                            ]);
                        }
                    }
                }

                $res_ho = [];
                // dd($role_ho['data']);
                if (!empty($role_ho['data'][0]['value'])) {
                    $res_ho  += explode(',', $role_ho['data'][0]['value']);
                } else {
                    $res_ho = [];
                }

                $data_ho = [];
                if (!empty($res_ho)) {
                    foreach ($res_ho as $items) {
                        $data_ho += array($items => $items);
                    }
                }

                //CK
                foreach ($check_ck['data'] as $item) {
                    foreach ($arr2  as $items) {
                        if ($item['id'] == $items) {
                            $role_ck = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                                'id' => $item['id'],
                                'del' => 6
                            ]);
                        }
                    }
                }

                $res_ck = [];
                if (!empty($role_ck['data'][0]['value'])) {
                    $res_ck  += explode(',', $role_ck['data'][0]['value']);
                } else {
                    $res_ck = [];
                }

                $data_CK0 = [];
                if (!empty($res_ck)) {
                    foreach ($res_ck as $items) {
                        $data_CK0 += array($items => $items);
                    }
                }
                // dd($data_CK0);

                //User GS
                $data_GS = [];
                $check_GS = Http::withToken($token)->post('http://192.168.128.193:8080/api/group-secret', [
                    'qty' => 100,
                ]);
                foreach ($check_GS['data'] as $item) {
                    if ($item['user_id'] == $user_id) {
                        $data_GS = 'GS_User';
                    }
                }

                View::share(['data_CK0' => $data_CK0, 'data_GS' => $data_GS, 'data_ho' => $data_ho, 'data_ori' => $data_ori, 'data_role' => $data_role, 'data_doc_type' => $data_doc_type, 'username' => $username, 'rolename' => $rolename, 'count_docc' => $count_docc, 'count_msg' => $count_msg]);
            }
        });
    }
}
