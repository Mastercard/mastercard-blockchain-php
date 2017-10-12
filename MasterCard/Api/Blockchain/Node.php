<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of
 * conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its
 * contributors may be used to endorse or promote products derived from this software
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS;
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
 * SUCH DAMAGE.
 *
 */

 namespace MasterCard\Api\Blockchain;

 use MasterCard\Core\Model\BaseObject;
 use MasterCard\Core\Model\RequestMap;
 use MasterCard\Core\Model\OperationMetadata;
 use MasterCard\Core\Model\OperationConfig;


/**
 * 
 */
class Node extends BaseObject {



	protected static function getOperationConfig($operationUUID) {
		switch ($operationUUID) {
			case "1e01f556-8fcf-46d1-8b0f-6ae8b53d753e":
				return new OperationConfig("/labs/proxy/chain/api/v1/network/create", "create", array(), array());
			case "cd6c6f74-9bc5-4b44-81e7-aaf45e532d5d":
				return new OperationConfig("/labs/proxy/chain/api/v1/network/invite", "create", array(), array());
			case "ec510663-9bcd-429b-83c7-3d3ae2a57f09":
				return new OperationConfig("/labs/proxy/chain/api/v1/network/join", "create", array(), array());
			case "30f87496-7c4f-43f1-91fb-91761bbe9940":
				return new OperationConfig("/labs/proxy/chain/api/v1/network/node/{address}", "read", array(), array());
			case "f6c88c31-5e79-4fd6-a463-99526bf36a7c":
				return new OperationConfig("/labs/proxy/chain/api/v1/network/node", "query", array(), array());
			
			default:
				throw new \Exception("Invalid operationUUID supplied: $operationUUID");
		}
	}

	protected static function getOperationMetadata() {
		$config = ResourceConfig::getInstance();
		return new OperationMetadata($config->getVersion(), $config->getHost(), $config->getContext(), $config->getJsonNative());
	}


   /**
	* Creates object of type Node
	*
	* @param Map map, containing the required parameters to create a new object
	* @return Node of the response of created instance.
	*/
	public static function provision($map)
	{
		return self::execute("1e01f556-8fcf-46d1-8b0f-6ae8b53d753e", new Node($map));
	}





   /**
	* Creates object of type Node
	*
	* @param Map map, containing the required parameters to create a new object
	* @return Node of the response of created instance.
	*/
	public static function invite($map)
	{
		return self::execute("cd6c6f74-9bc5-4b44-81e7-aaf45e532d5d", new Node($map));
	}





   /**
	* Creates object of type Node
	*
	* @param Map map, containing the required parameters to create a new object
	* @return Node of the response of created instance.
	*/
	public static function join($map)
	{
		return self::execute("ec510663-9bcd-429b-83c7-3d3ae2a57f09", new Node($map));
	}









	/**
	 * Returns objects of type Node by id and optional criteria
	 * @param type $id
	 * @param type $criteria
	 *
	 * @throws ApiException - which encapsulates the http status code and the error return by the server
	 *
	 * @return Node of the response
	 */
	public static function read($id, $criteria = null)
	{
		$map = new RequestMap();
		if (!empty($id)) {
			$map->set("id", $id);
		}
		if ($criteria != null) {
			$map->setAll($criteria);
		}
		return self::execute("30f87496-7c4f-43f1-91fb-91761bbe9940",new Node($map));
	}






	/**
	 * Query objects of type Node by id and optional criteria
	 *
	 * @param type $criteria
	 *
	 * @throws ApiException - which encapsulates the http status code and the error return by the server
	 *
	 * @return Node of the response
	 */
	public static function query($criteria)
	{
		return self::execute("f6c88c31-5e79-4fd6-a463-99526bf36a7c",new Node($criteria));
	}


}

