import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
<<<<<<< HEAD
=======
import './css/Collect.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Collect = (props) => {
    const { search_users } = props;
    
    return (
            
<<<<<<< HEAD
            <div class="title-box3">
                <div class="title-box3-title"><h1>検索一覧</h1></div>
                <p class="content">
                { search_users.map((search_user) => (
                    <div key={search_user.id}>
                        <p class="content">検索結果：[ <Link href={`/future/otherpage/${search_user.id}`}>{ search_user.name }</Link>]</p>
                    </div>
                )) }
                </p>
                <Link href={`/future`}>戻る</Link>
=======
            <div className="title-box3">
                <div className="title-box3-title"><h1>検索一覧</h1></div>
                <p className="content">
                { search_users.map((search_user) => (
                    <div key={search_user.id}>
                        <p className="content">検索結果：[ <Link href={`/future/otherpage/${search_user.id}`}>{ search_user.name }</Link>]</p>
                    </div>
                )) }
                </p>
                <div className="button019">
	               <Link href={`/future`}>戻る</Link>
	           </div>
>>>>>>> 3759a0a (react導入後初めてのコミット)
            </div>
            
    );
}

export default Collect;