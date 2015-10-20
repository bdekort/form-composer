<?php

/*
 * The MIT License
 *
 * Copyright 2015 LengthOfRope, Bas de Kort <bdekort@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace LengthOfRope\FormComposer\Elements;
use LengthOfRope\FormComposer\Interfaces;

/**
 * Description of Form
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
abstract class AbstractElement implements Interfaces\IFormElement
{
    private $label = '';
    private $required = false;
    private $id = false;
    private $placeholder = false;
    private $name = '';
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public static function factory($name)
    {
        return new static($name);
    }
    
    /**
     * Add a form element
     * 
     * @param \LengthOfRope\FormComposer\Interfaces\IFormElement $element
     * @return \LengthOfRope\FormComposer\Elements\AbstractElement
     */
    public function add(Interfaces\IFormElement $element)
    {
        return $this;
    }

    /**
     * Remove a form element
     * 
     * @param \LengthOfRope\FormComposer\Interfaces\IFormElement $element
     * @return \LengthOfRope\FormComposer\Elements\AbstractElement
     */
    public function remove(Interfaces\IFormElement $element)
    {
        return $this;
    }
    
    /**
     * Set the elements label text
     * @param string $label
     */
    public function label($label)
    {
        $this->label = $label;
        
        return $this;
    }
    
    /**
     * Set the required flag
     * 
     * @param bool $required
     * @return \LengthOfRope\FormComposer\Elements\AbstractElement
     */
    public function required($required = false)
    {
        $this->required = ($required === true);
        
        return $this;
    }
    
    /**
     * Check if required
     * @return boolean
     */
    protected function isRequired()
    {
        return $this->required;
    }
    
    /**
     * Set an id for this element
     * 
     * @param string $id
     * @return \LengthOfRope\FormComposer\Elements\AbstractElement
     */
    public function id($id = false)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * Set a placeholder for this element
     * 
     * @param string $placeholder
     * @return \LengthOfRope\FormComposer\Elements\AbstractElement
     */
    public function placeholder($placeholder = false)
    {
        $this->placeholder = $placeholder;
        
        return $this;
    }
    
    /**
     * Get the base elements attribute string
     * 
     * @return string
     */
    public function getBaseAttributes()
    {
        $return = '';
        if ($this->id) {
            $return .= sprintf(' id="%s"', $this->id);
        }
        
        if ($this->required !== false) {
            $return .= ' required="required"';
        }

        if ($this->placeholder !== false) {
            $return .= sprintf(' placeholder="%s"', $this->placeholder);
        }
        return trim($return);
    }
    
    /**
     * Get the name value
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Get the user value
     * 
     * @return mixed
     */
    public function getValue()
    {
        if (isset($_REQUEST[$this->getName()])) {
            return $_REQUEST[$this->getName()];
        }
        return '';
    }
}
