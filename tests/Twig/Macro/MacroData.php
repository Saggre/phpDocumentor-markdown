<?php

namespace PhpDocumentorMarkdown\Test\Twig\Macro;

use JsonSerializable;
use stdClass;

class MacroData implements JsonSerializable
{
    /**
     * @var string The name of the macro.
     */
    protected string $key;
    /**
     * @var mixed
     */
    protected $input;
    /**
     * @var mixed|null
     */
    protected $output;

    public function __construct(string $key, $input, $output = null)
    {
        $this->key    = $key;
        $this->input  = $input;
        $this->output = $output;
    }

    /**
     * @param  mixed  $output
     */
    public function setOutput($output): void
    {
        $this->output = $output;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @return mixed|null
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Creates a new instance of this class from parsed json.
     *
     * @param  stdClass|array  $data
     *
     * @return static
     */
    public static function fromJson($data): self
    {
        if (is_object($data)) {
            $data = (array)$data;
        }

        return new self(
            $data['key'],
            $data['input'],
            $data['output'] ?? null
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'key'    => $this->key,
            'input'  => $this->input,
            'output' => $this->output,
        ];
    }
}
