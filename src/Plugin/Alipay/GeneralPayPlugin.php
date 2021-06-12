<?php

declare(strict_types=1);

namespace Yansongda\Pay\Plugin\Alipay;

use Closure;
use Yansongda\Pay\Contract\PluginInterface;
use Yansongda\Pay\Logger;
use Yansongda\Pay\Rocket;

abstract class GeneralPayPlugin implements PluginInterface
{
    public function assembly(Rocket $rocket, Closure $next): Rocket
    {
        Logger::info('[alipay][GeneralPayPlugin] 通用插件开始装载', ['rocket' => $rocket]);

        $rocket->mergePayload([
            'method' => $this->getMethod(),
            'biz_content' => $rocket->getParams(),
        ]);

        Logger::info('[alipay][GeneralPayPlugin] 通用插件装载完毕', ['rocket' => $rocket]);

        return $next($rocket);
    }

    abstract protected function getMethod(): string;
}
