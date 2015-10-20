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

namespace LengthOfRope\FormComposer;

/**
 * Description of Form
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
abstract class AbstractFormGroup implements Interfaces\IFormElement
{
    /** @var Interfaces\IFormElement[] */
    protected $elements;
    
    public function __construct()
    {
        $this->elements = new \SplObjectStorage();
    }
    
    /**
     * Add a form element
     * 
     * @param \LengthOfRope\FormComposer\Interfaces\IFormElement $element
     * @return \LengthOfRope\FormComposer\IFormElement
     */
    public function add(Interfaces\IFormElement $element)
    {
        $this->elements->attach($element);
        
        return $this;
    }

    /**
     * Remove a form element
     * 
     * @param \LengthOfRope\FormComposer\Interfaces\IFormElement $element
     * @return \LengthOfRope\FormComposer\IFormElement
     */
    public function remove(Interfaces\IFormElement $element)
    {
        if ($this->elements->contains($element)) {
            $this->elements->detach($element);
        }
        
        return $this;
    }

    /**
     * Validate all children
     * 
     * @return boolean
     */
    public function validate()
    {
        foreach($this->elements as $element) {
            if (!$element->validate()) {
                return false;
            }
        }
        
        return true;
    }
}
