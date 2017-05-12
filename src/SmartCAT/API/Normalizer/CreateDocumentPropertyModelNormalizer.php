<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CreateDocumentPropertyModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\CreateDocumentPropertyModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\CreateDocumentPropertyModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\CreateDocumentPropertyModel();
        if (property_exists($data, 'externalId')) {
            $object->setExternalId($data->{'externalId'});
        }
        if (property_exists($data, 'metaInfo')) {
            $object->setMetaInfo($data->{'metaInfo'});
        }
        if (property_exists($data, 'disassembleAlgorithmName')) {
            $object->setDisassembleAlgorithmName($data->{'disassembleAlgorithmName'});
        }
        if (property_exists($data, 'bilingualFileImportSettings')) {
            $object->setBilingualFileImportSettings($this->serializer->deserialize($data->{'bilingualFileImportSettings'}, 'SmartCAT\\API\\Model\\BilingualFileImportSettingsModel', 'raw', $context));
        }
        if (property_exists($data, 'targetLanguages')) {
            $values = array();
            foreach ($data->{'targetLanguages'} as $value) {
                $values[] = $value;
            }
            $object->setTargetLanguages($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getExternalId()) {
            $data->{'externalId'} = $object->getExternalId();
        }
        if (null !== $object->getMetaInfo()) {
            $data->{'metaInfo'} = $object->getMetaInfo();
        }
        if (null !== $object->getDisassembleAlgorithmName()) {
            $data->{'disassembleAlgorithmName'} = $object->getDisassembleAlgorithmName();
        }
        if (null !== $object->getBilingualFileImportSettings()) {
            $data->{'bilingualFileImportSettings'} = $this->serializer->serialize($object->getBilingualFileImportSettings(), 'raw', $context);
        }
        if (null !== $object->getTargetLanguages()) {
            $values = array();
            foreach ($object->getTargetLanguages() as $value) {
                $values[] = $value;
            }
            $data->{'targetLanguages'} = $values;
        }
        return $data;
    }
}