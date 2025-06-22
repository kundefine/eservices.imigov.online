import React, {useState} from "react";
import ReactDOM from 'react-dom';
import {v4 as uuidv4} from 'uuid';

const Option = ({event, data}) => {
    let [options, setOptions] = useState(data);
    let [optionText, setOptionText] = useState('');
    let [optionValue, setOptionValue] = useState('');
    let [optionIsSelected, setOptionIsSelected] = useState(false);

    const addOption = () => {
        if(optionText.length < 1) {
            alert('please add Option Text');
            return;
        }

        let newOptions = [
            ...options,
            {
                id: uuidv4(),
                text: optionText,
                value: optionValue,
                isSelected: optionIsSelected,
            }
        ]

        setOptions(newOptions)
        setOptionText('')
        setOptionValue('')
        setOptionIsSelected(false)

        event.setOption(newOptions);
        newOptions.map(option => {
            if(option.isSelected) {
                event.setValue(option.value)
            }
        })
    }

    const renderOptionSelect = () => {
        let canRenderIsSelected = true;
        options.forEach((option) => {
            if(option.isSelected) {
                canRenderIsSelected = false;
                return;
            }
        })
        if(canRenderIsSelected) {
            return (
                <React.Fragment>
                    <input type="checkbox" name="value" className="ml-3 mr-1" checked={optionIsSelected}  onChange={(e) => setOptionIsSelected(e.target.checked)}/> Selected
                </React.Fragment>
            )
        }
        return null;
    }

    const deleteOption = (id) => {
        let newOptions =  options.filter(option => option.id != id)
        setOptions(newOptions)
        event.setOption(newOptions);

        newOptions.map(option => {
            if(option.isSelected) {
                event.setValue(option.value)
            } else {
                event.setValue("")
            }
        })
    }

    return (
        <React.Fragment>
            {
                options.length ?
                    <table className="table table-responsive table-bordered mb-3">
                        <thead>
                        <tr>
                            <th>Option Is Selected</th>
                            <th>Option Text</th>
                            <th>Option Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {options.map((option) => {
                            return (
                                <tr key={option.id}>
                                    <td>{option.isSelected ? 'Selected' : 'Not Selected'}</td>
                                    <td>{option.text}</td>
                                    <td>{option.value}</td>
                                    <td>
                                        <a onClick={() => deleteOption(option.id)} className="text-danger cursor-pointer">x</a>
                                    </td>
                                </tr>
                            )
                        })}
                        </tbody>
                    </table>
                : null
            }


            <div className="card">
                <div className="card-header bg-light">Add Options</div>
                <div className="card-body">
                    <div className="form-group">
                        <label htmlFor="">Option Text</label>
                        <div className="d-flex justify-content-around align-items-center">
                            <input type="text" name="value" className="form-control" placeholder="Ex: Option 1" value={optionText} onChange={(e) => setOptionText(e.target.value)}/>
                            {renderOptionSelect()}
                        </div>
                    </div>
                    <div className="form-group">
                        <label htmlFor="">Option Value</label>
                        <input type="text" name="value" className="form-control" placeholder="Ex: option 1" value={optionValue} onChange={(e) => setOptionValue(e.target.value)} />
                    </div>
                </div>
                <div className="card-footer">
                    <button className="btn btn-primary float-right" onClick={addOption}>Add Option</button>
                </div>
            </div>






            {/*<div className="form-group">
                <label htmlFor="">Option Text</label>
                <input type="text" name="label" className="form-control" placeholder="Ex: First Name, Last Name"  onChange={(e) => event.setLabel(e.target.value)} />
            </div>

            <div className="form-group">
                <label htmlFor="">Name</label>
                <input type="text" name="name" className="form-control" placeholder="Ex: country, address" onChange={(e) => event.setName(e.target.value)} />
            </div>


            <div className="form-group">
                <label htmlFor="">Add Options</label>
                <input type="text" name="value" className="form-control" placeholder="Ex: Add Option" />
                <button className="btn btn-primary mt-3" onClick={addOption}>Add Option</button>
            </div>*/}
        </React.Fragment>
    )
}

export default Option;
