<?php

namespace Demovendor\DemoPackage;

class DemoPackage
{
    public function sendRequest($baseUrl, $params = [])
    {
        try{
        $queryString = http_build_query($params);
        $url         = $baseUrl . '?' . $queryString;
        $curl        = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
            return [];
        }

        curl_close($curl);

        // Adjust encoding and parse XML
        $response = str_replace("utf-16", "utf-8", $response);
        $xmlData  = simplexml_load_string($response);

        if (!$xmlData) {
            echo 'Error: Failed to parse XML response.';
            return [];
        }

        // Initialize result array
        $result = [
            'guid'              => null,
            'buyerContractId'   => null,
            'consentOptionName' => null
        ];

        // Extract guid
        $result['guid'] = (string)$xmlData[1]->guid;

        // Iterate over eligible buyers to find group_number 1
        foreach ($xmlData[1]->eligible_buyers->group as $group) {
            if ((string)$group->group_number === "1") { // Check for group_number 1
                $result['buyerContractId']   = (string)$group->positions->position->buyer_contract_id;
                $result['consentOptionName'] = (string)$group->positions->position->consent_option_name;
                break; // Exit loop since we found the desired group
            }
        }

        // Return the result array
        return json_encode($result);}
        catch (Exception $e) {
            echo "Caught exception: " . $e->getMessage();
        }
    }
    public function getRequest($data)
    {
        $config = require '../config/appkey.php';
        $baseUrl = $config['app_url'];
        echo $baseUrl;
        try {
            // $config = require '../config/appkey.php';
            $buyerListApiClient = new DemoPackage();
            $params = [
                // Just for testing POC we pass these values dynamically.
                'ckm_campaign_id' => $data['ckm_campaign_id'],
                'ckm_key'         => $data['ckm_key'],
                'ckm_offer_id'    => $data['ckm_offer_id'],
                'state'           => $data['state'],
                'email_address'   => $data['email_address'],
                'first_name'      => $data['first_name'],
                'Last_name'       => $data['last_name'],
                'tax_debt'        => $data['tax_debt']
            ];

            // Base URL
            // $baseUrl = $config['app_url'];

            // Send the request and get the result
            $response = $buyerListApiClient->sendRequest($baseUrl, $params);
            echo $response;
        } catch (Exception $e) {
            echo "Caught exception: " . $e->getMessage();
        }
    }
}
