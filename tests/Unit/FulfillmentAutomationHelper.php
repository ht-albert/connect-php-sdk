<?php

/**
 * This file is part of the Ingram Micro Cloud Blue Connect SDK.
 *
 * @copyright (c) 2019. Ingram Micro. All Rights Reserved.
 */

namespace Test\Unit;

use Connect\FulfillmentAutomation;
use Connect\Request;

/**
 * Class FulfillmentAutomationHelper
 * @property \stdClass $std
 * @package Test\Unit
 */
class FulfillmentAutomationHelper extends FulfillmentAutomation
{
    /**
     * @param $request
     * @return \Connect\ActivationTemplateResponse|string
     * @throws \Connect\Fail
     * @throws \Connect\Inquire
     * @throws \Connect\Skip
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function processRequest($request)
    {
        switch ($request->id) {
            case 'PR-5620-6510-1234':
                return "Done";
            case 'PR-5620-6510-TMPL':
                return $this->renderTemplate("TL-1234-4321", $request);
            case 'PR-5620-6510-INQUIRE':
                throw new \Connect\Inquire([
                    new \Connect\Param([
                        'id' => 'howyoufeel',
                        'value_error' => 'I dont like how you feel today.'
                    ])
                ]);
            case 'PR-5620-6510-FAIL':
                throw new \Connect\Fail("Testing failures");
            case 'PR-5620-6510-SKIP':
                throw new \Connect\Skip("Testing skipping");
            default:
                return new \Connect\ActivationTemplateResponse("TL-1234-4321");
        }
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function getHttp()
    {
        return $this->http;
    }

    public function getStd()
    {
        return $this->std;
    }
}