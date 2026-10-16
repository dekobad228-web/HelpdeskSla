import './bootstrap';

import './echo';

import axios from 'axios';

const messages = document.querySelector('#messages');
const form = document.querySelector('#chat-form');
const input = document.querySelector('#message-body');

if (messages && form && input) {
    const ticketId = messages.dataset.ticketId;

    window.Echo
        .private(`chat.${ticketId}`)
        .listen('CommentStoredEvent', (event) => {
            appendComment(event.comment);
        });

    function appendComment(comment) {
        if (messages.querySelector(`[data-comment-id="${comment.id}"]`)) {
            return;
        }

        document.querySelector('#empty-messages')?.remove();

        const item = document.createElement('div');
        item.className = 'max-w-[85%] self-start rounded-xl bg-gray-100 p-3';
        item.dataset.commentId = comment.id;

        const author = document.createElement('p');
        author.className = 'text-xs text-gray-500';
        author.textContent = comment.name;

        const body = document.createElement('p');
        body.className = 'mt-1 whitespace-pre-wrap break-words text-gray-900';
        body.textContent = comment.body;

        item.append(author, body);
        messages.append(item);
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const body = input.value.trim();

        if (!body) {
            return;
        }

        try {
            await axios.post(form.action, { body });
            input.value = '';
        } catch (error) {
            console.error('Ошибка отправки сообщения:', error);
        }
    });
}
