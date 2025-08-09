<?php

namespace Jc\MultiDBConnection\Plugin\Framework\App;

use Magento\Framework\App\ResourceConnection as Subject;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\DeploymentConfig;

class ResourceConnection
{
    const REQUEST_HEADER_KEY = "JC-X-WEBSITE-ID";
    const ENV_CONFIG_KEY = "jc_x_website_id";

    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var DeploymentConfig
     */
    private $deploymentConfig;

    /**
     * @param RequestInterface $request
     * @param DeploymentConfig $deploymentConfig
     */
    public function __construct(
        RequestInterface $request,
        DeploymentConfig $deploymentConfig
    ) {
        $this->request = $request;
        $this->deploymentConfig = $deploymentConfig;
    }

    /**
     * @param Subject $subject
     * @param string $resourceName
     * @return array
     */
    public function beforeGetConnection(Subject $subject, $resourceName = Subject::DEFAULT_CONNECTION)
    {
        $XWebsiteIdFromHeader = $this->request->getHeader(self::REQUEST_HEADER_KEY);

        if (isset($XWebsiteIdFromHeader)) {
            $envConfig = $this->deploymentConfig->get(self::ENV_CONFIG_KEY);
            return isset($envConfig[$XWebsiteIdFromHeader]) ? [$envConfig[$XWebsiteIdFromHeader]['resource']] : [$resourceName];
        }
        return [$resourceName];
    }
}
