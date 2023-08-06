<?php
//
//use App\Models\Language;
//
//
//if (! function_exists('__')) {
//    function __($key = null, $replace = [], $locale = null)
//    {
//
//        if (session()->get('local') != null) {
//            $language = Language::where('iso_code', session()->get('local'))->first();
//        } else {
//            $language = Language::where('default_language', 'on')->first();
//        }
//
//        $main = $key;
//        if ($language) {
//            $path = resource_path()."/lang/$language->iso_code.json";
//            if(!file_exists($path)){
//                fopen(resource_path()."/lang/$language->iso_code.json", "w");
//                file_put_contents(resource_path()."/lang/$language->iso_code.json", '{}');
//            }
//            $website = json_decode(file_get_contents(resource_path('lang/' . $language->iso_code . '.json')), true);
//
//            $key = preg_replace('/\s+/S', " ", $key);
//            $keyArr = explode(' ', $key);
//            foreach ($keyArr as $word){
//                if(!str_contains($word, '_')){
//                    $strLowerWord = strtolower($word);
//                    $modifiedWord = ucwords(trim($strLowerWord));
//                    $key = str_replace($word,$modifiedWord,$key);
//                }
//            }
//
//            if (array_key_exists($key, $website)) {
//                if (session()->get('local') == null) {
//                    return $key;
//                }
//                return $website[$key];
//            }
//
//            $website[$key] = $key;
//            file_put_contents(resource_path('lang/' . $language->iso_code . '.json'), json_encode($website));
//            if (session()->get('local') == null) {
//                return $key;
//            }
//        }
//
//        if (is_null($key)) {
//            return $key;
//        }
//        return trans($key, $replace, $locale);
//    }
//}
