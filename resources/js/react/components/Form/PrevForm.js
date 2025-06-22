import React, {useEffect, useRef, useState} from "react";
import ReactDOM from "react-dom";


const PrevForm = ({form}) => {
    const printForm = () => {
        if(form.tagName == 'input') {
            return (
                <div className="form-group" key={form.id}>
                    <label htmlFor="">{form.label || form.id}</label>
                    <input
                        type={form.type || 'text'}
                        defaultValue={form.value}
                        placeholder={form.placeholder}
                        className="form-control"
                        name={form.name || form.id}
                    />
                </div>
            )
        } else if(form.tagName == 'textarea') {
            return (
                <div className="form-group" key={form.id}>
                    <label htmlFor="">{form.label || form.id}</label>
                    <textarea
                        defaultValue={form.value}
                        placeholder={form.placeholder || form.id}
                        className="form-control"
                        name={form.name || form.id}
                    >
                    </textarea>
                </div>
            )
        } else if(form.tagName == 'select') {
            return (
                <div className="form-group" key={form.id}>
                    <label htmlFor="">{form.label || form.id}</label>
                    <select name={form.name || form.id} value={form.value} onChange={() => form.value}>
                        {form.options.map(option => {
                            return (
                                <option defaultValue={option.value} key={option.id}>{option.text}</option>
                            )
                        })}
                    </select>
                </div>
            )
        } else if(form.tagName == 'datepicker') {
            return (
                <div className="form-group" key={form.id}>
                    <label htmlFor="">{form.label || form.id}</label>
                    <input
                        type={form.type || 'text'}
                        defaultValue={form.value}
                        placeholder={form.placeholder}
                        className="form-control"
                        name={form.name || form.id}
                    />
                </div>
            )
        }
    }



    return (printForm());
}

export default PrevForm;