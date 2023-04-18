import React, {useState, useEffect} from "react";
import ReactDOM from 'react-dom';
import Input from "./Input";
import Textarea from "./Textarea";
import Select from "./Select";
import Datepicker from "./Datepicker";

const Form = ({data, generatorState, deleteForm, errors, setError, errorFn, hasErrors}) => {


    let [form, setForm] = useState(data);
    const [collapse, setCollapse] = useState(false);

    useEffect(() => {
        generatorState(prevGenState => ({
                ...prevGenState,
                data: prevGenState.data.map(prevGenData => {
                    if(prevGenData.id === form.id) {
                        return form;
                    }
                    return prevGenData;
                })
            }))
    }, [form]);


    const inputEvent = {
        setName(name) {
            setForm(prevForm => ({...prevForm, name: name.trim()}));
            errorFn.formInput_Name(form.id, name);
        },
        setLabel(label) {
            setForm(prevForm => ({...prevForm, label: label}));
            errorFn.formInput_Label(form.id, label);
        },
        setPlaceholder(placeholder) {
            setForm(prevForm => ({...prevForm, placeholder: placeholder}))
        },
        setType(type) {
            setForm(prevForm => ({...prevForm, type: type}))
        },
        setValue(value) {
            setForm(prevForm => ({...prevForm, value: value}))
        },
        setClass(value) {
            setForm(prevForm => ({...prevForm, "class" : value}))
        }
    }
    const textareaEvent = {
        setName(name) {
            setForm(prevForm => ({...prevForm, name: name}))
            errorFn.formTextarea_Name(form.id, name);
        },
        setLabel(label) {
            setForm(prevForm => ({...prevForm, label: label}))
            errorFn.formTextarea_Label(form.id, label);
        },
        setPlaceholder(placeholder) {
            setForm(prevForm => ({...prevForm, placeholder: placeholder}))
        },
        setValue(value) {
            setForm(prevForm => ({...prevForm, value: value}))
        },
        setClass(value) {
            setForm(prevForm => ({...prevForm, "class" : value}))
        }
    }
    const selectEvent = {
        setName(name) {
            setForm(prevForm => ({...prevForm, name: name}))
            errorFn.formSelect_Name(form.id, name);
        },
        setLabel(label) {
            setForm(prevForm => ({...prevForm, label: label}))
            errorFn.formSelect_Label(form.id, label);
        },
        setValue(value) {
            setForm(prevForm => ({...prevForm, value: value}))
        },
        setOption(option) {
            setForm(prevForm => ({...prevForm, options: option}))
            errorFn.formSelect_Option(form.id, option)
        },
        setClass(value) {
            setForm(prevForm => ({...prevForm, "class" : value}))
        }
    }
    const datepickerEvent = {
        setName(name) {
            setForm(prevForm => ({...prevForm, name: name.trim()}));
            errorFn.formInput_Name(form.id, name);
        },
        setLabel(label) {
            setForm(prevForm => ({...prevForm, label: label}));
            errorFn.formInput_Label(form.id, label);
        },
        setPlaceholder(placeholder) {
            setForm(prevForm => ({...prevForm, placeholder: placeholder}))
        },
        setValue(value) {
            setForm(prevForm => ({...prevForm, value: value}))
        },
        setClass(value) {
            setForm(prevForm => ({...prevForm, "class" : value}))
        },
        setAltFormat(value) {
            setForm(prevForm => ({...prevForm, "altFormat" : value}))
        },
        setDateFormat(value) {
            setForm(prevForm => ({...prevForm, "dateFormat" : value}))
        }
    }




    const renderFormEl = () => {
        if(data.tagName === 'input') {
            return <Input id={form.id} event={inputEvent} errors={errors} hasErrors={hasErrors} data={data} />
        } else if (data.tagName === 'textarea') {
            return <Textarea id={form.id} event={textareaEvent} errors={errors} hasErrors={hasErrors} data={data}/>
        } else if(data.tagName === 'select') {
            return <Select id={form.id} event={selectEvent} errors={errors} hasErrors={hasErrors} data={data}/>
        } else if(data.tagName === 'datepicker') {
            return <Datepicker id={form.id} event={datepickerEvent} errors={errors} hasErrors={hasErrors} data={data}/>
        }
    }






    return (
        <div className="col-md-12 mb-3">
            <div className="card">
                <div className="card-header d-flex align-items-center justify-content-between">
                    <div className="card-header-left">{data.title}</div>
                    <div className="card-header-right">
                        <button id={data.id} className="btn btn-icon btn-danger btn-rounded btn-sm mr-1" onClick={() => deleteForm(data.id)}><i className="fa fa-trash-o"></i></button>
                        <button className="btn btn-icon btn-light btn-rounded btn-sm" type="button" onClick={() => setCollapse(!collapse)}>
                            {collapse ? <i className="fa fa-eye-slash"></i> : <i className="fa fa-eye"></i> }
                        </button>
                    </div>
                </div>
                <div className={(collapse ? 'collapse' : '')} id={data.id}>
                    <div className="card-body">
                        {renderFormEl()}
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Form;
