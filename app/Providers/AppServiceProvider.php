<?php

namespace App\Providers;

// use View;
use Illuminate\Support\Facades\View;
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

            if ($token) {
                $organi = Cookie::get('organi_id');

                try {
                    $response = Http::get('http://192.168.128.193:8080/api/doc-type');
                    if ($response->successful() && $response['message'] == 'success') {
                        $data_doc_type = $response['data'];
                    } else {
                        $data_doc_type = [];
                    }
                } catch (\Exception $e) {
                    $data_doc_type = [];
                    // Log the error or handle it as needed
                }

                $username = Cookie::get('user_name');
                $rolename = Cookie::get('role_id');
                $user_id = Cookie::get('user_id');
                $dep_id = Cookie::get('dpart_id');
                $arr2 = explode(',', $rolename);


                $docc_count = Http::withToken($token)->get('http://192.168.128.193:8080/api/log-docc-count');
                $count_docc = $docc_count['message'] == 'success' ? $docc_count['data'][0]['count'] : 0;

                $docc_count_1 = Http::withToken($token)->get('http://192.168.128.193:8080/api/log-docc-count', ['type' => 1]);
                $count_docc_thr = $docc_count_1['message'] == 'success' ? $docc_count_1['data'][0]['count'] : 0;

                $docc_count_2 = Http::withToken($token)->get('http://192.168.128.193:8080/api/log-docc-count', ['type' => 3]);
                $count_docc_other = $docc_count_2['message'] == 'success' ? $docc_count_2['data'][0]['count'] : 0;

                $msg_count = Http::withToken($token)->get('http://192.168.128.193:8080/api/inbox-count');
                $count_msg = $msg_count['message'] == 'success' ? $msg_count['data'][0]['count'] : 0;
                // dd($count_docc_private );
                $dp_id = [];
                if (!empty($dep_id)) {
                    $dp = Http::withToken($token)->post('http://192.168.128.193:8080/api/dpart/' . $dep_id);
                    $dp_id = $dp['message'] == 'success' ? $dp['data'] : [];
                }

                $check = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', ['id' => 1]);
                $check_rol = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', ['id' => 2]);
                $check_bai = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', ['id' => 3]);
                $check_ori = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', ['id' => 4]);
                $check_ho = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', ['id' => 5]);
                $check_ck = Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-del', ['id' => 6]);

                $role = $this->getRoleData($check, $arr2, $token, 1);
                $data_role = $this->formatRoleData($role);

                $role_rol = $this->getRoleData($check_rol, $arr2, $token, 2);
                $data_rol = $this->formatRoleData($role_rol);

                $role_bai = $this->getRoleData($check_bai, $arr2, $token, 3);
                $data_bai = $this->formatRoleData($role_bai);

                $role_ori = $this->getRoleData($check_ori, $arr2, $token, 4);
                $data_ori = $this->formatRoleData($role_ori);

                $role_ho = $this->getRoleData($check_ho, $arr2, $token, 5);
                $data_ho = $this->formatRoleData($role_ho);

                $role_ck = $this->getRoleData($check_ck, $arr2, $token, 6);
                $data_CK0 = $this->formatRoleData($role_ck);

                $data_GS = [];
                $check_GS = Http::withToken($token)->post('http://192.168.128.193:8080/api/group-secret', ['qty' => 100]);
                foreach ($check_GS['data'] as $item) {
                    if ($item['user_id'] == $user_id) {
                        $data_GS = 'GS_User';
                    }
                }
                View::share([
                    'dp_id' => $dp_id,
                    'data_rol' => $data_rol,
                    'data_bai' => $data_bai,
                    'data_CK0' => $data_CK0,
                    'data_GS' => $data_GS,
                    'data_ho' => $data_ho,
                    'data_ori' => $data_ori,
                    'data_role' => $data_role,
                    'data_doc_type' => $data_doc_type,
                    'username' => $username,
                    'rolename' => $rolename,
                    'count_docc' => $count_docc,
                    'count_docc_thr' => $count_docc_thr,
                    'count_docc_other' => $count_docc_other,
                    'count_msg' => $count_msg
                ]);
            }
        });
    }

    private function getRoleData($check, $arr2, $token, $del)
    {
        foreach ($check['data'] as $item) {
            foreach ($arr2 as $items) {
                if ($item['id'] == $items) {
                    return Http::withToken($token)->post('http://192.168.128.193:8080/api/roles-by-id', [
                        'id' => $item['id'],
                        'del' => $del
                    ]);
                }
            }
        }
        return [];
    }

    private function formatRoleData($role)
    {
        $res = [];
        if (!empty($role['data'][0]['value'])) {
            $res = explode(',', $role['data'][0]['value']);
        }
        $data = [];
        foreach ($res as $item) {
            $data[$item] = $item;
        }
        return $data;
    }
}
