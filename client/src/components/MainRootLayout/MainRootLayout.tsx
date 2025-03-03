import { Outlet } from "react-router-dom";

export default function MainRootLayout({ children }: { children: React.ReactNode }) {
    return (
        <div className="main-root-layout">
            <Outlet />
            {children}
        </div>
    );
}

