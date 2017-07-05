<?php
declare(strict_types=1);

namespace Enm\JsonApi\Server\Model\Request;

use Enm\JsonApi\Exception\JsonApiException;
use Enm\JsonApi\Model\Request\JsonApiRequest;
use Psr\Http\Message\RequestInterface;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class HttpRequest extends JsonApiRequest implements HttpRequestInterface
{
    use HttpRequestTrait;

    /**
     * @param RequestInterface $request
     * @param string $apiPrefix
     * @throws JsonApiException
     */
    public function __construct(RequestInterface $request, string $apiPrefix = '')
    {
        $this->httpRequest = $request;
        $this->apiPrefix = $apiPrefix;

        list($type, $id) = explode('/', $this->getNormalizedPath());

        parent::__construct($type, $id);
    }
}
