import React from "react";
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm } from '@inertiajs/inertia-react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
<<<<<<< HEAD
=======
import './css/Update.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Update = (props) => {
    const {profile} = props;
    const {me} = props;
    const {setting, setData, put} = useForm({
        profile: profile.content,
    })

    const handleSendPosts = (e) => {
        e.preventDefault();
        put(`/future/settingregister/update/${me}`);
    }
    return (
            <div>
            <form onSubmit={handleSendPosts}>
                <div>
                    <label for="search">プロフィール設定</label>
                    <input type="text"  onChange={(e) => setData("setting", e.target.value)}/>
                    <span className="text-red-600">{props.errors.title}</span>
                </div>                    
                    <button type="submit" className="p-1 bg-purple-300 hover:bg-purple-400 rounded-md">send</button>
            </form>

<<<<<<< HEAD
            <div class="back">
                <Link href={`/future`}>戻る</Link>
            </div>
=======
            <div className="button019">
	               <Link href={`/future`}>戻る</Link>
	           </div>
>>>>>>> 3759a0a (react導入後初めてのコミット)
        </div>
        );
}

export default Update;