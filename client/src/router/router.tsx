import SignUp from "@/features/auth/components/sign-up";
import AuthLayout from "@/layouts/auth-layout/auth-layout";
import {
  createBrowserRouter,
} from "react-router-dom";

export const router = createBrowserRouter([
  {
    path: "/",
    element: (
      <div>
        <h1>Hello World</h1>
      </div>
    ),
  },
  {
    path: "/sign-up",
    element: <AuthLayout>
      <SignUp />
    </AuthLayout>,
  },
]);

