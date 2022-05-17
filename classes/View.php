<?php

namespace classes;

class View
{
    use DinamicProperties;

    public function render(string $template): string
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
            //var_dump($$key);
        }
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display(string $template)
    {
        echo $this->render($template);
    }
}
