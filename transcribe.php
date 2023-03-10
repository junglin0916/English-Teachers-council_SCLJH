
<?php
  // Get the text input from the POST data
  $text = $_POST["text"];
  // Call the OpenAI API
  //  different model ID
  $model = "text-davinci-003"; // "text-ada-001"
  error_log($text);
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.openai.com/v1/engines/".$model."/completions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\"prompt\":\"".$text."\",\"max_tokens\":800}",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: Bearer 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"
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  echo $response;
?>