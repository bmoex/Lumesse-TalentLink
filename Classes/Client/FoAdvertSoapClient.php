<?php

namespace Serfhos\LumesseTalentLink\Client;

/**
 * SOAP Client: FoAdvert
 *
 * @see https://developer.lumesse-talenthub.com/docs/read/career_portal/FoAdvert.html
 * @method getAdvertisementById(array $properties)
 * @method getAdvertisementImages(array $properties)
 * @method getAdvertisementPreviewByToken(array $properties)
 * @method getAdvertisements(array $properties)
 * @method getAdvertisementsByPage(array $properties)
 * @method getAdvertisementsSortingColumns(array $properties)
 * @method getAttachments(array $properties)
 * @method getAttachmentsFromToken(array $properties)
 * @method getCriteria(array $properties)
 * @method getSimpleAdvertisements(array $properties)
 * @method getSimpleAdvertisementsByPage(array $properties)
 * @method getStandardCriteria(array $properties)
 */
class FoAdvertSoapClient extends \SoapClient
{
    /**
     * @param array $configuration
     * @return FoAdvertSoapClient
     */
    public static function create(array $configuration): FoAdvertSoapClient
    {
        $wsdl = $configuration['endpoint'] . '?WSDL';
        $object = new static($wsdl);
        $object->configure($configuration);
        return $object;
    }

    /**
     * @param array $configuration
     * @return bool
     */
    public function configure(array $configuration): bool
    {
        if (!empty($configuration)) {
            $credentials = new \stdClass();
            $credentials->Username = new \SoapVar(
                $configuration['username'],
                XSD_STRING,
                null,
                $configuration['security'],
                null,
                $configuration['security']
            );
            $credentials->Password = new \SoapVar(
                $configuration['password'],
                XSD_STRING,
                null,
                $configuration['security'],
                null,
                $configuration['security']
            );
            $credentialsToken = new \stdClass();
            $credentialsToken->UsernameToken = new \SoapVar(
                $credentials,
                SOAP_ENC_OBJECT,
                null,
                $configuration['security'],
                'UsernameToken',
                $configuration['security']
            );

            $authentication = new \SoapVar(
                $credentialsToken,
                SOAP_ENC_OBJECT,
                null,
                $configuration['security'],
                'UsernameToken',
                $configuration['security']
            );
            $security = new \SoapVar(
                $authentication,
                SOAP_ENC_OBJECT,
                null,
                $configuration['security'],
                'Security',
                $configuration['security']
            );

            $header = new \SoapHeader($configuration['security'], 'Security', $security);
            $this->__setSoapHeaders([$header]);
            $this->__setLocation($configuration['endpoint'] . '?api_key=' . $configuration['key']);
            return true;
        }
        return false;
    }
}
