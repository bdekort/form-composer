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

/**
 * Description of TextField
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class TextField extends AbstractElement
{
    /**
     * Retrieve the elements (and all childrens) html output
     * 
     * @return string
     */
    public function getHTML()
    {
        return '<input ' . 
            $this->getBaseAttributes() . 
            ' type="text"'.
            ' value="' . htmlentities($this->getValue(), ENT_QUOTES) . '"'.
            ' name="' . $this->getName() . '" />';
    }

    /**
     * Validate all children
     * 
     * @return boolean
     */
    public function validate()
    {
        if (!$this->isRequired()) {
            return true;
        }
        
        return (strlen($this->getValue()) > 0);
    }

}
