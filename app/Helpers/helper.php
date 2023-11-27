<?php

use Illuminate\Support\Facades\Storage;

    if (!function_exists('generateCode')) {
        function generateCode(string $prefix, $number)
        {
            $number = $number ? (int) $number + 1 : 00001;
            $code = sprintf('%05d', $number);
            return $prefix . $code;
        }
    }

    if(!function_exists('isSelected')) {
        function isSelected ($name, $key, $value, $option) {
            return old($name) == ($option ? $value->$option : $key);
        };
    }

    if (!function_exists('customIsSelected')) {
        function customIsSelected($name, $data, $field = null, $fieldCompare = null) {
            $isSelected = function ($key, $value) use ($data, $name, $field, $fieldCompare) {
                $val = $fieldCompare ? $value->$fieldCompare : $key;
                return old($name) == $val || ($data->$field == $val && !old($name));
            };

            return $isSelected;
        }
    };

    if(!function_exists('isSelectedMultiple')) {
        function isSelectedMultiple ($name, $type) {
            $isSelected = function ($key, $value) use ($name, $type) {
                return in_array($key, ($type == "request" ? request($name) : old($name)) ?? []);
            };

            return $isSelected;
        };
    }

    // set default image 
    if(!function_exists('defaultImage')){
        function defaultImage() {
            return 'assets/images/profile/user-1.jpg';
        }
    }

    // check exist image
    if(!function_exists('checkIssetImage')){
        function checkIssetImage ($req, $data=['image'=>'', 'prefixName'=>'', 'folder'=>'', 'imageOld'=>'']) {
            $dataImage = $data['imageOld'] ? $data['imageOld'] : defaultImage();
            if($req->hasFile($data['image'])){
                deleteFile($data['imageOld']);
                $file = $req->file($data['image']);
                $dataImage = fileUpload($file, $data['prefixName'], $data['folder']);
            }
            if($req['tmp_image'] && $req['origin_name'] !== null){
                $sourcePath = $req['tmp_image'];
                $destinationPath = $data['folder'] . '/';
                $newFileName = $req['origin_name'];
                $dataImage = $destinationPath . $newFileName;
                Storage::move($sourcePath, $dataImage);
            }
            return $dataImage;
        }
    }

    // save file
    if(!function_exists('fileUpload')){
        function fileUpload ($file, $prefixName = '', $folder = ''){
            $fileName = $file->hashName();
            $fileName = $prefixName
            ? $prefixName.'_'.$fileName
            : time() .'_'.$fileName;
            return $file->storeAs($folder, $fileName);
        }
    }

    // delete file in storage
    if(!function_exists('deleteFile')){
        function deleteFile ($dataImage) {
            if(Storage::exists($dataImage)){
                Storage::delete($dataImage);
            }
        }
    }
?>