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
import CreateBookmark from "./pages/CreateBookmark";
import AppName from "./components/AppName";

export default function App() {
    return (
        <div id="app">
            <Router>
                <header>
                    <AppName/>
                    <nav id="primaryNav">
                        <Link to="/bookmarks/create">+ NEW</Link>
                    </nav>
                </header>
                <Switch>
                    <Route path="/repositories">
                        <Repositories/>
                    </Route>
                    <Route path="/bookmarks/create">
                        <CreateBookmark/>
                    </Route>
                    <Route path="/bookmarks">
                        <Bookmarks/>
                    </Route>
                    <Route path="/">
                        <Bookmarks/>
                    </Route>
                </Switch>
                <footer>
                    <div>
                        {process.env.MIX_APP_NAME} &copy; {(new Date()).getFullYear()}
                    </div>
                    <nav id="secondaryNav">
                        <Link to="/repositories">Repositories</Link>
                        <Link to="/repositories">Bookmarks</Link>
                        <Link to="/settings">Settings</Link>
                    </nav>
                </footer>
            </Router>
        </div>
    );
}

ReactDOM.render(<App/>, document.getElementById('root'));
