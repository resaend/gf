<?php

#AUTO CLAIM VOC GOJEK

#MASUKIN AKUN YANG UDAH VERIF 

#Created By Alip Dzikri X Apri AMsyah X Resa Endrawan

#########################################

$secret = '83415d06-ec4e-11e6-a41b-6c40088ab51e';

$headers = array();

$headers[] = 'Content-Type: application/json';

$headers[] = 'X-AppVersion: 3.27.0';

$headers[] = "X-Uniqueid: ac94e5d0e7f3f".rand(111,999);

$headers[] = 'X-Location: -6.405821,106.064193';

		echo "===========================\n";		echo " Auto redeem voucher GOJEK \n";

		echo "===========================\n";

		echo "[+] Masukkan Nomor : ";

		$number = trim(fgets(STDIN));

		$numbers = $number[0].$number[1];

		$numberx = $number[5];

		if($numbers == "08") { 

			$number = str_replace("08","628",$number);

		} elseif ($numberx == " ") {

			$number = preg_replace("/[^0-9]/", "",$number);

			$number = "1".$number;

		}

		echo "[+] Masukkan Nama : ";

		$nama = trim(fgets(STDIN));

		$email = strtolower(str_replace(" ", "", $nama) . mt_rand(100,999) . "@gmail.com");

		$data1 = '{"name":"' . $nama . '","email":"' . $email . '","phone":"+' . $number . '","signed_up_country":"ID"}';

		$reg = curl('https://api.gojekapi.com/v5/customers', $data1, $headers);

		$regs = json_decode($reg[0]);

		// Verif OTP

		if($regs->success == true) {

			echo "[+] OTP code: ";

			$otp = trim(fgets(STDIN));

			$data2 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $regs->data->otp_token . '"},"client_secret":"' . $secret . '"}';

			$verif = curl('https://api.gojekapi.com/v5/customers/phone/verify', $data2, $headers);

			$verifs = json_decode($verif[0]);

			if($verifs->success == true) {

				// Claim Voucher

				$token = $verifs->data->access_token;

				$headers[] = 'Authorization: Bearer '.$token;

				 $live = "token.txt";

    $fopen1 = fopen($live, "a+");

    $fwrite1 = fwrite($fopen1, "TOKEN => ".$token." \n NOMOR => ".$number." \n");

    fclose($fopen1);

    echo "[+] File Token tersimpan di ".$live." \n";

    echo "[+] Proses Redeem Voucher GOFOOD 20k + 10k\n";

				$data3 = '{"promo_code":"0"}';

					echo " Proses redeem telah selesai\n";

					sleep(0);

	} else {

		print_r($jstf);

		}

					

					} 

												

							function nama()

	{

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

	$ex = curl_exec($ch);

	// $rand = json_decode($rnd_get, true);

	preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);

	return $name[2][mt_rand(0, 14) ];

	}

function curl($url, $fields = null, $headers = null)

    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if ($fields !== null) {

            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        }

        if ($headers !== null) {

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        }

        $result   = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        

        return array(

            $result,

            $httpcode

        );

	}

    

    
