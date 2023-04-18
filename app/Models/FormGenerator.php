<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormGenerator extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = ["id"];
    protected $appends = ['content_json', 'content_html', 'content_react'];



    public function getContentJsonAttribute()
    {
        return json_decode($this->content);
    }
    public function getContentHtmlAttribute()
    {
        return $this->buildHtml($this->content_json);
    }
    public function getContentReactAttribute()
    {
        return $this->buildForReact($this->content_json);
    }

    protected function buildHtml($contentJson)
    {
        $html = [];
        foreach ($contentJson as $content) {
            if(property_exists($content, "tagName")){
                if($content->tagName === 'input') {
                    $html[] = $this->buildInput($content);
                } else if($content->tagName === 'textarea') {
                    $html[] = $this->buildTextarea($content);
                } else if($content->tagName === 'select') {
                    $html[] = $this->buildSelect($content);
                }else if($content->tagName === 'datepicker') {
                    $html[] = $this->buildDatepicker($content);
                }
            }
        }
        return $html;
    }

    protected function buildForReact($contentJson)
    {
        $html = [];
        foreach ($contentJson as $content) {
            if(property_exists($content, "tagName")){
                if($content->tagName === 'input') {
                    $html[] = $this->buildInputForReact($content);
                } else if($content->tagName === 'textarea') {
                    $html[] = $this->buildTextareaForReact($content);
                } else if($content->tagName === 'select') {
                    $html[] = $this->buildSelectForReact($content);
                }else if($content->tagName === 'datepicker') {
                    $html[] = $this->buildDatepickerForReact($content);
                }
            }
        }
        return $html;
    }

    public function printHtml()
    {
        return implode("", $this->content_html);
    }

    protected function buildInput($content)
    {
        return <<< htmlInput
        <div class="form-group">
            <label>{$content->label}</label>
            <{$content->tagName} type="{$content->type}" name="{$content->name}" id="{$content->id}" class="form-control {$content->class}" value="{$content->value}" placeholder="{$content->placeholder}" >
        </div>
        
htmlInput;

    }
    protected function buildInputForReact($content)
    {
        return <<< htmlInput
        <div class="form-group">
            <label>{$content->label}</label>
            <{$content->tagName} type="{$content->type}" name="{$content->name}" id="{$content->id}" className="form-control {$content->class}" defaultValue="{$content->value}" placeholder="{$content->placeholder}" />
        </div>
        
htmlInput;

    }
    protected function buildTextarea($content)
    {
        return <<< htmlTextarea
        <div class="form-group">
            <label>{$content->label}</label>
            <{$content->tagName} name="{$content->name}" id="{$content->id}" class="form-control {$content->class}" placeholder="{$content->placeholder}" >{$content->value}</{$content->tagName}>
        </div>
        
htmlTextarea;

    }
    protected function buildTextareaForReact($content)
    {
        return <<< htmlTextarea
        <div class="form-group">
            <label>{$content->label}</label>
            <{$content->tagName} name="{$content->name}" id="{$content->id}" className="form-control {$content->class}" placeholder="{$content->placeholder}" defaultValue="{$content->value}"></{$content->tagName}>
        </div>
        
htmlTextarea;

    }
    protected function buildSelect($content)
    {
        $options_string = '';

        foreach ($content->options as $option) {

            $options_string .= <<< options
            <option id="{$option->id}" value="{$option->value}" selected="{$option->isSelected}">{$option->text}</option>
options;

        }

        return <<< htmlSelect
        <div class="form-group">
            <label>{$content->label}</label>
            <{$content->tagName} name="{$content->name}" id="{$content->id}" class="form-control {$content->class}">
            {$options_string}
            </$content->tagName>
        </div>
        
htmlSelect;

    }
    protected function buildSelectForReact($content)
    {
        $options_string = '';

        foreach ($content->options as $option) {

            $options_string .= <<< options
            <option id="{$option->id}" defaultValue="{$option->value}" selected="{$option->isSelected}">{$option->text}</option>
options;

        }

        return <<< htmlSelect
        <div class="form-group">
            <label>{$content->label}</label>
            <{$content->tagName} name="{$content->name}" id="{$content->id}" className="form-control {$content->class}">
            {$options_string}
            </$content->tagName>
        </div>
        
htmlSelect;

    }
    protected function buildDatepicker($content)
    {
        return <<< htmlDatePicker
        <div class="form-group">
            <label>{$content->label}</label>
            <input
                type="{$content->type}" 
                name="{$content->name}" 
                id="{$content->id}" 
                class="form-control flatpicker {$content->class}" 
                value="{$content->value}" 
                placeholder="{$content->placeholder}" 
                data-alt-format="{$content->altFormat}"
                data-date-format="{$content->dateFormat}"
                data-alt-input="true" >
        </div>
        
htmlDatePicker;

    }
    protected function buildDatepickerForReact($content)
    {
        return <<< htmlDatePicker
        <div class="form-group">
            <label>{$content->label}</label>
            <input
                type="{$content->type}" 
                name="{$content->name}" 
                id="{$content->id}" 
                className="form-control flatpicker {$content->class}" 
                defautlValue="{$content->value}" 
                placeholder="{$content->placeholder}" 
                data-alt-format="{$content->altFormat}"
                data-date-format="{$content->dateFormat}"
                data-alt-input="true" >
        </div>
        
htmlDatePicker;

    }
}
