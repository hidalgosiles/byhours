<?php
namespace AppBundle\Model;

/**
 * OpenSSL service : Create RSA keys
 *
 * <pre>
 * Gheorghe 17/11/2016 Creation
 * </pre>
 * @author Gheorghe <gheorghe@leadiance.net>
 * @version 1.0
 */
class OpenSSL
{

    private $pareKeys;
    private $publicKey;
    private $privateKey;
    private $config = array(
        "digest_alg" => "sha512",
        "private_key_bits" => 1024,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    );

    /**
     * Construct, initial configure
     */
    public function __construct()
    {
        // ==== Create the private and public key ====
        $this->setPareKeys(openssl_pkey_new($this->config));
        $this->exportPublicKey();
        $this->exportPrivateKey();
    }

    /**
     * Export private key from RSA Pare key
     * @return string With private key
     */
    protected function exportPrivateKey()
    {
        openssl_pkey_export($this->getPareKeys(), $lsPrivateKey);
        $this->setPrivateKey($lsPrivateKey);
        return $lsPrivateKey;
    }
// exportPrivateKey

    /**
     * Export public key from RSA Pare key
     * @return string With public key
     */
    protected function exportPublicKey()
    {
        $laPublicKey = openssl_pkey_get_details($this->getPareKeys());
        $this->setPublicKey($laPublicKey["key"]);
        return $laPublicKey["key"];
    }
// exportPublicKey

    /**
     * Encrypt $psData
     * @param type $psData
     * @return string Encripted data
     */
    public function encrypt($psData)
    {
        openssl_public_encrypt($psData, $lsEncrypted, $this->getPublicKey());
        return $lsEncrypted;
    }
// encrypt

    /**
     * Decrypt $psEncrypted data
     * @param type $psEncrypted
     * @return string Decripted data
     */
    public function decrypt($psEncrypted)
    {
        openssl_private_decrypt($psEncrypted, $lsDecrypted, $this->getPrivateKey());
        return $lsDecrypted;
    }
// decrypt

    /**
     * 
     * @param type $pareKeys
     * @return $this
     */
    public function setPareKeys($pareKeys)
    {
        $this->pareKeys = $pareKeys;
        return $this;
    }

    /**
     * 
     * @param type $publicKey
     * @return $this
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
        return $this;
    }

    /**
     * 
     * @param type $privateKey
     * @return $this
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getPareKeys()
    {
        return $this->pareKeys;
    }

    /**
     *  
     * @return type
     */
    public function getPublicKey()
    {
        // ==== Remove inecesary comments from publickey ====
        $this->publicKey = preg_replace('/\r\n|\r|\n/', '', $this->publicKey);
        $this->publicKey = str_replace('-----BEGIN PUBLIC KEY-----', '', $this->publicKey);
        $this->publicKey = str_replace('-----END PUBLIC KEY-----', '', $this->publicKey);
        return $this->publicKey;
    }

    /**
     * 
     * @return type
     */
    public function getPrivateKey()
    {
        // ==== Remove inecesary comments from private key ====
        $this->privateKey = preg_replace('/\r\n|\r|\n/', '', $this->privateKey);
        $this->privateKey = str_replace('-----BEGIN PRIVATE KEY-----', '', $this->privateKey);
        $this->privateKey = str_replace('-----END PRIVATE KEY-----', '', $this->privateKey);
        return $this->privateKey;
    }
}
