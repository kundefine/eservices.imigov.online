import React, {useState} from "react";
import ReactDOM from 'react-dom';

const Textarea = ({id, event, errors, hasErrors, data}) => {
    let [textareaData, setTextareaData] = useState(data)
    return (
        <React.Fragment>
            <div className="row">
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="">Label</label>
                        <input
                            type="text"
                            name="label"
                            className={ hasErrors(`formTextarea-name-${id}`) ? "form-control form-control-danger" : "form-control" }
                            placeholder="Ex: First Name, Last Name"
                            defaultValue={textareaData.label}
                            onChange={(e) => event.setLabel(e.target.value)}
                            onBlur={(e) => event.setLabel(e.target.value)}
                        />
                        <small className="text-danger mt-2">{hasErrors(`formTextarea-label-${id}`) ? hasErrors(`formTextarea-label-${id}`).message : null}</small>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="">Name</label>
                        <input
                            type="text"
                            name="name"
                            className={ hasErrors(`formTextarea-name-${id}`) ? "form-control form-control-danger" : "form-control" }
                            placeholder="Ex: first_name, last_name"
                            defaultValue={textareaData.name}
                            onChange={(e) => event.setName(e.target.value)}
                            onBlur={(e) => event.setName(e.target.value)}
                        />
                        <small className="text-danger mt-2">{hasErrors(`formTextarea-name-${id}`) ? hasErrors(`formTextarea-name-${id}`).message : null}</small>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="">Value</label>
                        <input
                            type="text"
                            name="value"
                            className="form-control"
                            placeholder="Ex: Default Value"
                            defaultValue={textareaData.value}
                            onChange={(e) => event.setValue(e.target.value)} />
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="">Placeholder</label>
                        <input
                            type="text"
                            name="value"
                            className="form-control"
                            placeholder="Ex: Default Value"
                            defaultValue={textareaData.placeholder}
                            onChange={(e) => event.setPlaceholder(e.target.value)} />
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="">Class Name</label>
                        <input
                            type="text"
                            name="class"
                            className="form-control"
                            placeholder="Ex: class_name_1 class_name_2"
                            defaultValue={textareaData.class}
                            onChange={(e) => event.setClass(e.target.value)} />
                    </div>
                </div>
            </div>
        </React.Fragment>
    )
}

export default Textarea;
