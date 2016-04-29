<?php

$json = <<<_END

{
  "language": "en",
  "textAngle": 0,
  "orientation": "Up",
  "regions": [
    {
      "boundingBox": "791,118,592,838",
      "lines": [
        {
          "boundingBox": "799,118,453,58",
          "words": [
            {
              "boundingBox": "799,118,102,58",
              "text": "IF"
            },
            {
              "boundingBox": "937,119,109,57",
              "text": "WE"
            },
            {
              "boundingBox": "1087,118,165,58",
              "text": "DID"
            }
          ]
        },
        {
          "boundingBox": "792,184,512,176",
          "words": [
            {
              "boundingBox": "792,184,512,176",
              "text": "ALL"
            }
          ]
        },
        {
          "boundingBox": "796,368,515,60",
          "words": [
            {
              "boundingBox": "796,368,155,59",
              "text": "THE"
            },
            {
              "boundingBox": "993,368,318,60",
              "text": "THINGS"
            }
          ]
        },
        {
          "boundingBox": "791,441,312,57",
          "words": [
            {
              "boundingBox": "791,441,108,57",
              "text": "WE"
            },
            {
              "boundingBox": "937,441,166,57",
              "text": "ARE"
            }
          ]
        },
        {
          "boundingBox": "797,508,586,87",
          "words": [
            {
              "boundingBox": "797,508,586,87",
              "text": "CAPABLE"
            }
          ]
        },
        {
          "boundingBox": "795,607,452,72",
          "words": [
            {
              "boundingBox": "795,607,106,59",
              "text": "OF"
            },
            {
              "boundingBox": "941,607,306,72",
              "text": "DOING,"
            }
          ]
        },
        {
          "boundingBox": "791,678,424,60",
          "words": [
            {
              "boundingBox": "791,680,108,57",
              "text": "WE"
            },
            {
              "boundingBox": "937,678,278,60",
              "text": "WOULD"
            }
          ]
        },
        {
          "boundingBox": "793,750,498,59",
          "words": [
            {
              "boundingBox": "793,750,498,59",
              "text": "LITERALLY"
            }
          ]
        },
        {
          "boundingBox": "791,821,390,60",
          "words": [
            {
              "boundingBox": "791,821,390,60",
              "text": "ASTOUND"
            }
          ]
        },
        {
          "boundingBox": "795,893,531,63",
          "words": [
            {
              "boundingBox": "795,893,531,63",
              "text": "OURSELVES."
            }
          ]
        }
      ]
    }
  ]
}
_END;


?>

<pre><?php
     
     // var_dump($decoded['regions'][0]['lines']);
     $decoded = json_decode($json, true);

     $result = "";

     var_dump($decoded);
     $regions = array_column($decoded, "regions");
     
     var_dump($regions);


     foreach($decoded['regions'] as $region) {
       foreach($region['lines'] as $lines) {
         foreach($lines["words"] as $words) {
           $result .= $words["text"] . " ";
         }       
       }
     }
     
     echo $result;

     ?>
