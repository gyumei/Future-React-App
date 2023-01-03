import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
<<<<<<< HEAD
import './Mypage.css';
=======
import './css/Mypage.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Mypage = (props) => {
    const { mypage } = props; 
    const { profiles } = props; 
    const { me } = props; 
    
    return (
            <body>
<<<<<<< HEAD
                <div class="sample_box5">
=======
                <div className="sample_box5">
>>>>>>> 3759a0a (react導入後初めてのコミット)
                    <h1>マイページです</h1>
                    <p>ようこそ!!{ mypage.name }さん</p>
                    
            {
                (
                   ()=> {
                        if(profiles === null) {
                        return (
                            <Link href={`/future/first_setting/${me}`}>プロフィールを設定する</Link>
                            );
                        } else {
                        return (
                        <div>
                            <Link href={`/future/settingregister/put/${me}`}>編集する</Link>
                            <p>{ profiles.content }</p>
                        </div>
                         )
                        }
                        }
                    )
                ()
            }
            </div>
            
<<<<<<< HEAD
            <div class="button019">
=======
            <div className="button019">
>>>>>>> 3759a0a (react導入後初めてのコミット)
                <Link href={`/future`}>ホームに戻る</Link>
            </div>
            </body>
        );
}

export default Mypage;