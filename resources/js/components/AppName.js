import {Link} from "react-router-dom";
import * as React from "react";


const AppName = () => {
    return (
        <div id="appName">
            <Link to="/">
                <span>{process.env.MIX_APP_NAME.substr(0, 2)}</span>
                {process.env.MIX_APP_NAME.substr(2)}
            </Link>
        </div>
    )
};

export default AppName;
