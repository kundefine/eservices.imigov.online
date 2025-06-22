import React, {useState, useEffect, useRef} from "react";
import ReactDOM from 'react-dom';
import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.min.css';

const Datepicker = ({id, event, errors, hasErrors, data}) => {

    let [datepickerData, setData] = useState(data);
    let datePickerRef = useRef();
    let currentFlatPicker = useRef(null);
    const clearFlatPicker = () => {
        if(currentFlatPicker.current) {
            currentFlatPicker.current.clear();
            event.setValue('');
        }
    }


    useEffect(() => {
        flatpickr(datePickerRef.current, {
            onChange: function(selectedDates, dateStr, instance) {
                event.setValue(dateStr);
                currentFlatPicker.current = instance;
            },
            altInput: true,
            altFormat: datepickerData.altFormat,
            dateFormat: datepickerData.dateFormat,
        });
    }, [datepickerData.value, datepickerData.altFormat, datepickerData.dateFormat])



    return (
        <React.Fragment>
            <div className="row">
                <div className="col-md-6">
                <div className="form-group">
                    <label htmlFor="" className="mb-0 mr-5">Label <span className="text-danger">*</span></label>
                    <input type="text"
                           name="label"
                           className={ hasErrors(`formInput-label-${id}`) ? "form-control form-control-danger" : "form-control" }
                           placeholder="Ex: First Name, Last Name"
                           defaultValue={datepickerData.label}
                           onChange={(e) => event.setLabel(e.target.value)}
                           onBlur={(e) => event.setLabel(e.target.value)}
                    />
                    <small className="text-danger mt-2">{hasErrors(`formInput-label-${id}`) ? hasErrors(`formInput-label-${id}`).message : null}</small>
                </div>
            </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="" className="mb-0 mr-5">Name <span className="text-danger">*</span></label>
                        <input
                            type="text"
                            name="name"
                            className={ hasErrors(`formInput-name-${id}`) ? "form-control form-control-danger" : "form-control" }
                            placeholder="Ex: first_name, last_name"
                            defaultValue={datepickerData.name}
                            onChange={(e) => event.setName(e.target.value)}
                            onBlur={(e) => event.setName(e.target.value)}
                        />
                        <small className="text-danger mt-2">{hasErrors(`formInput-name-${id}`) ? hasErrors(`formInput-name-${id}`).message : null}</small>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="" className="mb-0 mr-5">Placeholder</label>
                        <input
                            type="text"
                            name="placeholder"
                            className="form-control"
                            placeholder="Ex: dd/mm/yyyy"
                            defaultValue={datepickerData.placeholder}
                            onChange={(e) => event.setPlaceholder(e.target.value)}
                        />
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="" className="mb-0 mr-5">Value</label>
                        <div className="input-group date datepicker">
                            <input
                                ref={datePickerRef}
                                type="text"
                                name="value"
                                className="form-control"
                                placeholder="Ex: dd/mm/yyyy"
                                defaultValue={datepickerData.value}
                            />
                            <span className="input-group-addon cursor-pointer">
                                <i className="fa fa-close" onClick={clearFlatPicker}></i>
                            </span>


                        </div>

                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="" className="mb-0 mr-5">Class Name</label>
                        <input
                            type="text"
                            name="class"
                            className="form-control"
                            placeholder="Ex: class_name_1 class_name_2"
                            defaultValue={datepickerData.class}
                            onChange={(e) => event.setClass(e.target.value)}
                        />
                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="" className="mb-0 mr-5">Alt Format</label>
                        <input
                            type="text"
                            name="alt_format"
                            className="form-control"
                            placeholder="F j, Y"
                            defaultValue={datepickerData.altFormat}
                            onChange={(e) => {
                                event.setAltFormat(e.target.value)
                                setData(prevData => ({...prevData, altFormat: e.target.value}))
                            }}
                        />
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="form-group">
                        <label htmlFor="" className="mb-0 mr-5">Date Format</label>
                        <input
                            type="text"
                            name="date_format"
                            className="form-control"
                            placeholder="F j, Y"
                            defaultValue={datepickerData.dateFormat}
                            onChange={(e) => {
                                event.setDateFormat(e.target.value)
                                setData(prevData => ({...prevData, dateFormat: e.target.value}))
                            }}
                        />
                    </div>
                </div>
            </div>
        </React.Fragment>
    )
}

export default Datepicker;
