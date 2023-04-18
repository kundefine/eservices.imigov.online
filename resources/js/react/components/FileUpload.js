import React, {useRef, useState} from "react";
import './FileUpload.css';
import axios from "axios";

const FileUpload = ({syncState, name, label, value, multiple}) => {

    const [files, setFiles] = useState(syncState)
    const fileChange = (e) => {
        if(e.target.files.length) {
            let files = e.target.files
            setFiles([...files]);
            value([...files]);
        }
    }

    const removeFile = (e, index) => {
        let fileArray = [...files];
        fileArray.splice(index, 1)
        setFiles(fileArray);
        value(fileArray)
    }

    const previewUploadImage = () => {
        if(!syncState.length) return null;
        return syncState.map((file, index) => {
            return (
                <div className="upload-img-preview" key={file.lastModified}>
                    <div className="card w-100">
                        <div className="card-header d-flex justify-content-between align-items-center">
                            <div className="card-header-left">{`name: ${file.name}`} - {`size: ${file.size}`}</div>
                            <div className="card-header-right">
                                <i className="fa fa-trash-o text-danger cursor-pointer" onClick={(e) => removeFile(e, index)}></i>
                            </div>

                        </div>
                        <div className="card-body p-2">
                            <img className="upload-image" src={URL.createObjectURL(file)}/>
                        </div>
                    </div>
                </div>
            )
        })
    }


    return (
        <div className="form-group">
            <div className="react-image-uploader">
                <label className="file-upload-label">
                    {label}
                </label>
                <div className="file-upload-input">
                    <label>
                        Choose file
                        <input
                            type="file"
                            name={name}
                            style={{"display": "none"}}
                            onChange={(e) => fileChange(e)}
                            multiple={multiple}
                            accept="image/*"
                        />
                    </label> <small className="text-small ml-2">{syncState.length ? `Total Selected ${syncState.length}` : null}</small>
                </div>
                <div className="upload-image-container">
                    {previewUploadImage()}
                </div>
            </div>
        </div>
    )
}
export default FileUpload;