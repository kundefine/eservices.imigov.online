import React, {useEffect, useRef, useState} from "react";
import ReactDOM from "react-dom";
import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.min.css';

const FormStore = ({form, id, storer}) => {

    const [data, setData] = useState(form);
    const dataChange = (e) => {
        setData(prevData => {
            let value = e.target.value;
            if(prevData.tagName == 'select') {
                let options = prevData.options.map(option => {
                    if(option.value == value) {
                        return {
                            ...option,
                            isSelected: true
                        }
                    } else {
                        return {
                            ...option,
                            isSelected: false
                        }
                    }
                })

                return {
                    ...prevData,
                    options: options,
                    value: value,
                }
            }

            return {
                ...prevData,
                value: value
            }
        })
    }
    let datePicker = useRef(null);

    useEffect(() => {
        if(data.tagName == 'datepicker') {
            flatpickr(datePicker.current, {
                onChange: function(selectedDates, dateStr, instance) {
                    setData(prevData => ({...prevData, value: dateStr}))
                },
                altInput: true,
                altFormat: data.altFormat,
                dateFormat: data.dateFormat,
            });
        }

        if(storer) {
            storer({id: id, value: data})
        }


    }, [data]);


    const printForm = () => {
        if(form.tagName == 'input') {
            return (
                <div className="form-group" key={data.id}>
                    <label htmlFor="">{data.label || data.id}</label>
                    <input
                        type={data.type || 'text'}
                        value={data.value || ""}
                        onChange={dataChange}
                        placeholder={data.placeholder}
                        className="form-control"
                        name={data.name || data.id}
                    />
                </div>
            )
        } else if(form.tagName == 'textarea') {
            return (
                <div className="form-group" key={data.id}>
                    <label htmlFor="">{data.label || data.id}</label>
                    <textarea
                        value={data.value}
                        onChange={dataChange}
                        placeholder={data.placeholder || data.id}
                        className="form-control"
                        name={data.name || data.id}
                    >
                    </textarea>
                </div>
            )
        } else if(data.tagName == 'select') {
            return (
                <div className="form-group" key={data.id}>
                    <label htmlFor="">{data.label || data.id}</label>
                    <select name={data.name || data.id} value={data.value} onChange={dataChange}>
                        {data.options.map(option => {
                            return (
                                <option value={option.value} key={option.id}>{option.text}</option>
                            )
                        })}
                    </select>
                </div>
            )
        } else if(data.tagName == 'datepicker') {
            return (
                <div className="form-group" key={data.id}>
                    <label htmlFor="">{data.label || data.id}</label>
                    <input
                        ref={datePicker}
                        type={data.type || 'text'}
                        defaultValue={data.value}
                        placeholder={data.placeholder}
                        className="form-control"
                        name={data.name || data.id}
                    />
                </div>
            )
        }
    }



    return (printForm());
}

export default FormStore;