<?php

namespace SmartCAT\API\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class CallbackErrorModelNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'SmartCAT\\API\\Model\\CallbackErrorModel') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \SmartCAT\API\Model\CallbackErrorModel) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \SmartCAT\API\Model\CallbackErrorModel();
        if (property_exists($data, 'created')) {
            $object->setCreated(new \DateTime($data->{'created'}));
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'reason')) {
            $object->setReason($data->{'reason'});
        }
        if (property_exists($data, 'code')) {
            $object->setCode($data->{'code'});
        }
        if (property_exists($data, 'content')) {
            $object->setContent($data->{'content'});
        }
        if (property_exists($data, 'sourceIds')) {
            $values = array();
            foreach ($data->{'sourceIds'} as $value) {
                $values[] = $value;
            }
            $object->setSourceIds($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getCreated()) {
            $data->{'created'} = $object->getCreated()->format("Y-m-d\TH:i:sP");
        }
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getReason()) {
            $data->{'reason'} = $object->getReason();
        }
        if (null !== $object->getCode()) {
            $data->{'code'} = $object->getCode();
        }
        if (null !== $object->getContent()) {
            $data->{'content'} = $object->getContent();
        }
        if (null !== $object->getSourceIds()) {
            $values = array();
            foreach ($object->getSourceIds() as $value) {
                $values[] = $value;
            }
            $data->{'sourceIds'} = $values;
        }
        return $data;
    }
}