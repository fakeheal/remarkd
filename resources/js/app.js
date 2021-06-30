require('./bootstrap');
import * as React from 'react';
import * as ReactDOM from "react-dom";

import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from "react-router-dom";
import Home from "./pages/Home";
import Bookmarks from "./pages/Bookmarks";
import Repositories from "./pages/Repositories";

export default function App() {
    return (
        <Router>
            <div>
                <nav>
                    <ul>
                        <li>
                            <Link to="/">Home</Link>
                        </li>
                        <li>
                            <Link to="/bookmarks">Bookmarks</Link>
                        </li>
                        <li>
                            <Link to="/repositories">Repositories</Link>
                        </li>
                    </ul>
                </nav>
                <Switch>
                    <Route path="/repositories">
                        <Repositories/>
                    </Route>
                    <Route path="/bookmarks">
                        <Bookmarks/>
                    </Route>
                    <Route path="/">
                        <Home/>
                    </Route>
                </Switch>
            </div>
        </Router>
    );
}

ReactDOM.render(<App/>, document.getElementById('root'));
