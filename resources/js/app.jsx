import { HashRouter, Link, Route, Routes } from "react-router-dom";
import "./bootstrap";

import ReactDOM, { createRoot } from "react-dom/client";
import Home from "./Components/Home";
import About from "./Components/About";

const MainRouter = () => {
    return (
        <HashRouter>
            <Link to={"/"}>Home</Link>
            <Link to={"/about"}>About</Link>
            {/* <Home />
            <About /> */}
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/about" element={<About />} />
            </Routes>
        </HashRouter>
    );
};
createRoot(document.getElementById("root")).render(<MainRouter />);
