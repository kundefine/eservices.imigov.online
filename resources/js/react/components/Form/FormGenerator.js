import React, {useState, useEffect} from "react";
import ReactDOM from 'react-dom';
import Form from './Form'
import {v4 as uuidv4} from 'uuid';
import axios from "axios";
import PrevForm from "./PrevForm";




const FormGenerator = () => {
    let formPreviewStyle = {
        position: "fixed",
        width: "40%"
    };

    let [formGen, setFormGen] = useState({
        name: '',
        uuid: uuidv4(),
        data: []
    });
    let [formSave, setFormSave] = useState(window.formGeneratorStoreUrl ? {type: "create", url: window.formGeneratorStoreUrl} : {type: "update", url: window.formGeneratorUpdateUrl});



    useEffect(() => {
        if(formSave.type == 'update') {
            axios.get(window.formGeneratorAjaxShowUrl).then(({data}) => {
                setFormGen(() => ({
                    name: data.name,
                    uuid: data.uuid,
                    data: JSON.parse(data.content)
                }))
            });
        }
    }, []);


    let [errors, setError] = useState({})
    let errorFn = {
        formGen_Name(name, id) {
            if(name.trim().length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formGen-name-${id}`,
                        error: true,
                        message: "This field is required"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formGen-name-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formGen-name-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
        formInput_Name(id, name) {
            if(name.trim().length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formInput-name-${id}`,
                        error: true,
                        message: "This field is required"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formInput-name-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else if(name.trim().split(" ").length > 1) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formInput-name-${id}`,
                        error: true,
                        message: "Space is not allowed in this field"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formInput-name-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formInput-name-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
        formInput_Label(id, label) {
            if(label.trim().length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formInput-label-${id}`,
                        error: true,
                        message: "Form Input label is required"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formInput-label-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formInput-label-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
        formTextarea_Name(id, name) {
            if(name.trim().length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formTextarea-name-${id}`,
                        error: true,
                        message: "This field is required"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formTextarea-name-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else if(name.trim().split(" ").length > 1) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formTextarea-name-${id}`,
                        error: true,
                        message: "Space is not allowed in this field"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formTextarea-name-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formTextarea-name-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
        formTextarea_Label(id, label) {
            if(label.trim().length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formTextarea-label-${id}`,
                        error: true,
                        message: "This field is required"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formTextarea-label-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formTextarea-label-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
        formSelect_Name(id, name) {
            if(name.trim().length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formSelect-name-${id}`,
                        error: true,
                        message: "This field is required"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formSelect-name-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else if(name.trim().split(" ").length > 1) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formSelect-name-${id}`,
                        error: true,
                        message: "Space is not allowed in this field"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formSelect-name-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formSelect-name-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
        formSelect_Label(id, label) {
            if(label.trim().length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formSelect-label-${id}`,
                        error: true,
                        message: "This field is required"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formSelect-label-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formSelect-label-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
        formSelect_Option(id, options) {
            if(options.length == 0) {
                setError((prevErrors) => {
                    let fields;
                    let errorMessage = {
                        id: id,
                        name: `formSelect-options-${id}`,
                        error: true,
                        message: "Please Add minimum one option"
                    };
                    if(prevErrors.fields) {
                        let fieldFound = prevErrors.fields.filter(field => field.name == `formSelect-options-${id}`);
                        if(fieldFound.length) {
                            fields = [...prevErrors.fields];
                        } else {
                            fields = [...prevErrors.fields, errorMessage];
                        }
                    } else {
                        fields = [errorMessage];
                    }
                    return {
                        ...prevErrors,
                        fields: fields
                    }
                })
            } else {
                if(errors.fields) {
                    const newFields = errors.fields.filter((field) => field.name != `formSelect-options-${id}`)
                    setError(prevError => ({...prevError, fields: newFields}));
                }
            }
        },
    }

    const hasErrors = (field_name) => {
        let errorFound = null;
        if(errors.fields && errors.fields.length) {
            errorFound = errors.fields.find(function(error){
                return error.name == field_name;
            })
        }
        return errorFound;
    }
    const fieldData = {
        input: {
            id: uuidv4(),
            title: "Input Field",
            tagName: 'input',
            name: '',
            label: '',
            placeholder: '',
            value: '',
            type: 'text',
            "class" : ''
        },
        textarea: {
            id: uuidv4(),
            title: "Textarea",
            tagName: 'textarea',
            name: "",
            label: "",
            placeholder: "",
            value: "",
            "class" : ""
        },
        select: {
            id: uuidv4(),
            title: "Select",
            tagName: 'select',
            name: "",
            label: "",
            options: [],
            "class" : "",
            value: ""
        },
        datepicker : {
            id: uuidv4(),
            title: "Datepicker",
            tagName: 'datepicker',
            name: "",
            label: "",
            placeholder: "",
            value: "",
            type: 'text',
            "class" : '',
            altFormat: "Y-m-d",
            dateFormat: "Y-m-d",
        },
    }
    const style = {
        width: "200px",
        border: "2px solid #ddd"
    }

    const setName = (e) => {
        setFormGen({
            ...formGen,
            name: e.target.value
        })
        errorFn.formGen_Name(e.target.value, formGen.uuid);
    }



    const showFormButton = () => {
        if(!formGen.name.length) {
            return null;
        }
        if(!formGen.data.length) {
            return null;
        }
        if(errors && errors.fields && errors.fields.length) {
            return null;
        }
        return <button type="submit" className="btn btn-primary float-right" onClick={() => saveForm()}>{formSave.type == "update" ? "Update Form" : "Save Form"}</button>
    }
    const previewForm = () => {
        return formGen.data.map(form => <PrevForm form={form} key={form.id}/>)
    }
    const addForm = (e, type) => {
        let data = formGen.data;
        let newData;
        if (type == 'input') {
            newData = fieldData['input']
        } else if (type == 'textarea') {
            newData = fieldData['textarea']
        } else if (type == 'select') {
            newData = fieldData['select']
        } else if (type == 'datepicker') {
            newData = fieldData['datepicker']
        }

        setFormGen({
            ...formGen,
            data: [
                ...data,
                newData
            ]
        })
    }
    const deleteForm = (id) => {
        let newData = formGen.data.filter(form => id != form.id);
        setFormGen(prevFormGen => (
            {
                ...prevFormGen,
                data: newData
            }
        ));

        setError(prevError => {
            if(prevError.fields && prevError.fields.length) {
                return {
                    fields: prevError.fields.filter(field => field.id != id)
                }
            } else {
                return prevError;
            }
        })
    }
    const saveForm = async () => {
        if(!formGen.name.length) {
            alert('Please add form name');
            return;
        }
        if(!formGen.data.length) {
            alert('Please add some form data');
            return;
        }

        try {
            let res = await window.axios({
                method: formSave.type == 'update' ? 'patch' : 'post',
                url: formSave.url,
                data: {formGen}
            });
            if(res.status == 201 || res.status == 200) {
                window.location.reload();
            }
        } catch (e) {
            document.getElementById('alert-sections').innerHTML = e.response.data;
        }

    }




    return (
        <div className="row">
            <div className="col-md-6">
                <div className="card">
                    <div className="card-header">
                        <div className="row justify-content-between align-items-center">
                            <div className="col-md-6">Create New Form </div>
                            <div className="col-md-6">
                                <div className="dropdown float-right">
                                    <button className="btn btn-light dropdown-toggle" type="button"
                                            id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Add Form
                                    </button>
                                    <div className="dropdown-menu float-right" aria-labelledby="dropdownMenuButton">
                                        <a className="dropdown-item" onClick={() => addForm(event, 'input')}>Input</a>
                                        <a className="dropdown-item"
                                           onClick={() => addForm(event, 'textarea')}>Textarea</a>
                                        <a className="dropdown-item" onClick={() => addForm(event, 'select')}>Select</a>
                                        <a className="dropdown-item" onClick={() => addForm(event, 'datepicker')}>Datepicker</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="card-body">
                        <div className="form-group">
                            <label htmlFor="name">Form Name <span className="text-danger">*</span></label>
                            <input
                                className={ hasErrors(`formGen-name-${formGen.uuid}`) ? "form-control form-control-danger" : "form-control" }
                                type="text"
                                placeholder="Ex: Domain Form, Hosting Form"
                                value={formGen.name}
                                onChange={setName}
                                onBlur={setName}
                            />
                            <small className="text-danger mt-2">{hasErrors(`formGen-name-${formGen.uuid}`) ? hasErrors(`formGen-name-${formGen.uuid}`).message : null}</small>
                        </div>
                        <div className="row">
                            {formGen.data.map(d => <Form
                                    key={d.id}
                                    data={d}
                                    generatorState={setFormGen}
                                    deleteForm={deleteForm}
                                    errors={errors}
                                    setError={setError}
                                    errorFn={errorFn}
                                    hasErrors={hasErrors}
                                />
                            )}
                        </div>

                    </div>

                    <div className="card-footer">
                        {showFormButton()}
                    </div>
                </div>
            </div>

            {/*Preview Form*/}
            <div className="col-md-6">
                <div className="card" style={formPreviewStyle}>
                    <div className="card-header">
                        <div className="row justify-content-between align-items-center">
                            <div className="col-md-6">Form Preview</div>

                        </div>
                    </div>
                    <div className="card-body">
                        <div className="row">
                            <div className="col-md-12">
                                { formGen.data.length ? previewForm() : <small className='text-muted'>Please add some form data</small> }
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default FormGenerator;
