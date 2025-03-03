import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { zodResolver } from "@hookform/resolvers/zod";
import { Label } from "@/components/ui/label";
import { SignUpFormValues, signUpSchema } from "../schemas";
import { useForm, SubmitHandler } from "react-hook-form"

export default function SignUp() {
    const { register, handleSubmit, formState: { errors } } = useForm<SignUpFormValues>({
        resolver: zodResolver(signUpSchema)
    });

    const onSubmit: SubmitHandler<SignUpFormValues> = (data) => {
        console.log("Signup Data:", data);
    };

    return (
        <div className="max-w-sm mx-auto p-6 space-y-4">
            <h2 className="text-xl font-semibold">Sign Up</h2>
            <form onSubmit={handleSubmit(onSubmit)} className="space-y-3">
                <div>
                    <Label htmlFor="email">Email</Label>
                    <Input id="email" type="email" {...register("email")} />
                    {errors.email && <p className="text-red-500 text-sm">{errors.email.message}</p>}
                </div>
                <div>
                    <Label htmlFor="password">Password</Label>
                    <Input id="password" type="password" {...register("password")} />
                    {errors.password && <p className="text-red-500 text-sm">{errors.password.message}</p>}
                </div>
                <div>
                    <Label htmlFor="confirmPassword">Confirm Password</Label>
                    <Input id="confirmPassword" type="password" {...register("confirmPassword")} />
                    {errors.confirmPassword && <p className="text-red-500 text-sm">{errors.confirmPassword.message}</p>}
                </div>
                <Button type="submit" className="w-full">Sign Up</Button>
            </form>
        </div>
    );
}
