import React, {useState} from "react";

const Collapse = (props) => {
    const [collapse, setCollapse] = useState(props.show === undefined ? true : props.show);
    let icon = {
        open: "fa fa-eye",
        close: "fa fa-eye-slash"
    }
    if(props.icon && Object.keys(props.icon).length == 2) {icon = props.icon;}

    return (
        <div className="card">
            <div className="card-header bg-light d-flex align-items-center justify-content-between">
                <div className="card-header-left">{props.heading || "Default Heading"}</div>
                <div className="card-header-right">
                    <button className="btn btn-icon btn-light btn-rounded btn-sm" type="button" onClick={() => setCollapse(!collapse)}>
                        {collapse ? <i className={icon.close} /> : <i className={icon.open} /> }
                    </button>
                </div>
            </div>
            <div className={(collapse ? '' : 'collapse')}>
                {props.children}
            </div>
        </div>
    )
}

export default Collapse;