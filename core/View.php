<?php

namespace core;

class View
{
    public function render($name, $params =[])
    {
        return $this->renderPhpFile($name, $params);
    }

    public function renderPhpFile($name, $params =[])
    {
        $viewFile = __DIR__ . '/../view/'. $name.'.php';
        $_obInitialLevel_ = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);
        try {
            require $viewFile;
            return ob_get_clean();
        } catch (\Exception $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        } catch (\Throwable $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }
}