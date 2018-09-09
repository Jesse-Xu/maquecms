<?php
namespace app\common;
use OSS\OssClient;
use OSS\Core\OssException;
use think\facade\Config;

#Oss 文件管理类#

class Oss {

	public $ossClient;
	public $config;

	public function __construct(){

		$this->config=Config::get('site.alioss');

		$this->ossClient = new OssClient($this->config['id'], $this->config['secret'], $this->config['endpoint']);

	}

	#创建Bucket#
	public function CreateBucket($name){

		try {
		    return $this->ossClient->createBucket($name);
		} catch (OssException $e) {
		    print $e->getMessage();
		}

	}

	#下载文件#
	public function GetFile($bucket,$object){

		try {
		    $this->content = $this->ossClient->getObject($bucket, $object);
		    print("object content: " . $content);
		} catch (OssException $e) {
		    print $e->getMessage();
		}

	}
	#列举文件#
	public function GetList($bucket){

		try {
		    
		    $listObjectInfo = $this->ossClient->listObjects($bucket);
		    $objectList = $listObjectInfo->getObjectList();
		    if (!empty($objectList)) {
		        foreach ($objectList as $objectInfo) {
		        print($objectInfo->getKey() . "\t" . $objectInfo->getSize() . "\t" . $objectInfo->getLastModified() . "\n");
		        }
		    }
		} catch (OssException $e) {
		    print $e->getMessage();
		}

	}

	#删除文件#
	public function DeleteFile($object){

		try {
		   return  $this->ossClient->deleteObject($this->config['bucket'], $object);
		} catch (OssException $e) {
		    print $e->getMessage();
		}

	}
	
	/**
	* 上传指定的本地文件内容
	* @param string $object 存储空间保存名称
	* @param string $content 文件或文件内容
	* @return null
	*/
	public function LoadFile($object, $content){

		try {
		  return  $this->ossClient->uploadFile($this->config['bucket'],$object, $content); 
		} catch (OssException $e) {
		    print $e->getMessage();
		}

	}

	/**
	* 上传字符串作为object的内容
	* @param string $object 存储空间保存名称
	* @param string $content 文件内容
	* @return null
	*/
	public function PutFile($object, $content){

		//实例
	    //$object = "oss-php-sdk-test/upload-test-object-name.txt";
	    //$content = file_get_contents(__FILE__);
	    
	    try{
	        return $this->ossClient->putObject($this->config['bucket'], $object, $content);
	    } catch(OssException $e) {
	        printf(__FUNCTION__ . ": FAILED\n");
	        printf($e->getMessage() . "\n");
	        return;
	    }
	}


}