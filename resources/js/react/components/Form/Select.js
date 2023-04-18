import React, {useState} from "react";
import ReactDOM from 'react-dom';
import Option from "./Option";


const Select = ({id, event, errors, hasErrors, data}) => {
    let [selectData, setSelectData] = useState(data);
    return (
        <React.Fragment>
            <div className="form-group">
                <label htmlFor="">Label</label>
                <input
                    type="text"
                    name="label"
                    className={ hasErrors(`formSelect-label-${id}`) ? "form-control form-control-danger" : "form-control" }
                    placeholder="Ex: Select your country, Select your school"
                    defaultValue={selectData.label}
                    onChange={(e) => event.setLabel(e.target.value)}
                    onBlur={(e) => event.setLabel(e.target.value)}
                />
                <small className="text-danger mt-2">{ hasErrors(`formSelect-label-${id}`) ? hasErrors(`formSelect-label-${id}`).message : null}</small>
            </div>

            <div className="form-group">
                <label htmlFor="">Name</label>
                <input
                    type="text"
                    name="name"
                    defaultValue={selectData.name}
                    className={ hasErrors(`formSelect-name-${id}`) ? "form-control form-control-danger" : "form-control" }
                    placeholder="Ex: country, school"
                    onChange={(e) => event.setName(e.target.value)}
                    onBlur={(e) => event.setName(e.target.value)}
                />
                <small className="text-danger mt-2">{ hasErrors(`formSelect-name-${id}`) ? hasErrors(`formSelect-name-${id}`).message : null}</small>
            </div>

            <div className="form-group">
                <label htmlFor="">Class Name</label>
                <input
                    type="text"
                    name="class"
                    defaultValue={selectData.class}
                    className="form-control"
                    placeholder="Ex: class_name_1 class_name_2"
                    onChange={(e) => event.setClass(e.target.value)}
                    onBlur={(e) => event.setClass(e.target.value)}
                />
            </div>

            <div className="form-group">
                <Option event={event} data={selectData.options}/>
                <small className="text-danger mt-2">{ hasErrors(`formSelect-options-${id}`) ? hasErrors(`formSelect-options-${id}`).message : null}</small>
            </div>
        </React.Fragment>
    )
}

export default Select;
